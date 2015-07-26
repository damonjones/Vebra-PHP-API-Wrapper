<?php

/*
 * This file is part of the YDD\Vebra package.
 *
 * (c) 2012 Damon Jones <damon@yummyduckdesign.co.uk> and Matthew Davis <matt@yummyduckdesign.co.uk>

 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace YDD\Vebra;

use YDD\Vebra\Exception\XMLParsingException,
    YDD\Vebra\Exception\NoContentException,
    YDD\Vebra\Exception\NotModifiedException,
    YDD\Vebra\Exception\UnauthorizedException,
    YDD\Vebra\Exception\ForbiddenException,
    YDD\Vebra\Exception\NotFoundException,
    YDD\Vebra\Exception\GoneException,
    YDD\Vebra\Exception\InternalServerErrorException,
    YDD\Vebra\Exception\NotImplementedException,
    YDD\Vebra\Exception\UnknownStatusCodeException
;

use YDD\Vebra\TokenStorage\TokenStorageInterface;

use Buzz\Client\ClientInterface,
    Buzz\Message\Factory\FactoryInterface,
    Buzz\Message\Response,
    Buzz\Exception\InvalidArgumentException
;

use YDD\Vebra\Model\BranchSummary,
    YDD\Vebra\Model\Branch,
    YDD\Vebra\Model\PropertySummary,
    YDD\Vebra\Model\Property,
    YDD\Vebra\Model\Address,
    YDD\Vebra\Model\Price,
    YDD\Vebra\Model\Area,
    YDD\Vebra\Model\EnergyRatingPair,
    YDD\Vebra\Model\Paragraph,
    YDD\Vebra\Model\Dimension,
    YDD\Vebra\Model\Bullet,
    YDD\Vebra\Model\File,
    YDD\Vebra\Model\ChangedPropertySummary,
    YDD\Vebra\Model\ChangedFileSummary
;

/**
 * An implementation of the Vebra API
 */
class API
{
    const HOST = 'http://webservices.vebra.com';

    protected $baseUrl;
    protected $dataFeedId;
    protected $username;
    protected $password;
    protected $tokenStorage;
    protected $client;
    protected $messageFactory;

    /**
     * Constructor
     *
     * @param string                $dataFeedId     The data feed ID
     * @param string                $username       The username
     * @param string                $password       The password
     * @param TokenStorageInterface $tokenStorage   The client storage
     * @param ClientInterface       $client         The client
     * @param FactoryInterface      $messageFactory The message factory
     */
    public function __construct($dataFeedId, $username, $password, TokenStorageInterface $tokenStorage, ClientInterface $client, FactoryInterface $messageFactory, $feedVersion = 'v8')
    {
        $this->baseUrl         = sprintf('/export/%s/'.$feedVersion.'/', $dataFeedId);
        $this->dataFeedId      = $dataFeedId;
        $this->username        = $username;
        $this->password        = $password;
        $this->tokenStorage    = $tokenStorage;
        $this->client          = $client;
        $this->messageFactory  = $messageFactory;
    }

    /**
     * execute
     *
     * @param string  $url           The URL
     * @param Boolean $secondAttempt If the request is the second attempt (after re-authentication due to a 401)
     *
     * @throws XMLParsingException
     * @throws NoContentException
     * @throws NotModifiedException
     * @throws UnauthorizedException
     * @throws ForbiddenException
     * @throws NotFoundException
     * @throws GoneException
     * @throws InternalServerErrorException
     * @throws NotImplementedException
     * @throws UnknownStatusCodeException
     *
     * @return SimpleXMLElement
     */
    public function execute($url, $secondAttempt = false)
    {
        if (!is_string($url) || empty($url)) {
            throw new \InvalidArgumentException('URL must be a non-empty string.');
        }

        $request = $this->messageFactory->createRequest('GET', $this->baseUrl . $url, self::HOST);
        $request->addHeader('Authorization: Basic ' . base64_encode($this->tokenStorage->getToken()));
        $response = $this->messageFactory->createResponse();
        $this->client->send($request, $response);

        switch ($response->getStatusCode()) {
            // All okay
            case 200:
                // Return a SimpleXMLElement created from the response
                $saved = libxml_use_internal_errors(true);
                $xml = simplexml_load_string($response->getContent());
                $errors = libxml_get_errors();
                libxml_clear_errors();
                libxml_use_internal_errors($saved);

                if ($errors) {
                    throw new XMLParsingException($errors);
                }

                return $xml;
                break;

            // No content
            case 204:
                throw new NoContentException;
                break;

            // Not modified
            case 304:
                throw new NotModifiedException;
                break;

            // Unauthorized
            case 401:
                if ($secondAttempt) {
                    throw new UnauthorizedException;
                }

                // The token may have expired, request a new token
                $tokenRequest = $this->messageFactory->createRequest('GET', $this->baseUrl . 'branch', self::HOST);
                $tokenRequest->addHeader('Authorization: Basic ' . base64_encode($this->username.':'.$this->password));
                $tokenResponse = $this->messageFactory->createResponse();
                $this->client->send($tokenRequest, $tokenResponse);

                if (401 === $tokenResponse->getStatusCode()) {   
                    // Unauthorized: current token hasn't expired or invalid credentials
                    throw new UnauthorizedException;
                }

                // save the token
                $token = $tokenResponse->getHeader('Token');
                $this->tokenStorage->setToken(trim($token)); 

                // try again
                return $this->execute($url, true);
                break;

            // Forbidden
            case 403:
                throw new ForbiddenException;
                break;

            // Not found
            case 404:
                throw new NotFoundException;
                break;

            // Gone
            case 410:
                throw new GoneException;
                break;

            // Internal Server Error
            case 500:
                throw new InternalServerErrorException;
                break;

            // Not implemented
            case 501:
                throw new NotImplementedException;
                break;

            // Unknown status code
            default:
                throw new UnknownStatusCodeException;
                break;
        }
    }


    /**
     * get Branches
     *
     * @return array
     */
    public function getBranches()
    {
        $branches = array();

        $xml = $this->execute('branch');

        foreach ($xml->branch as $xmlBranch) {
            $branch = new BranchSummary;
            $branch->setName(self::normalise($xmlBranch->name, 'string'));
            $branch->setFirmId(self::normalise($xmlBranch->firmid, 'int'));
            $branch->setBranchId(self::normalise($xmlBranch->branchid, 'int'));
            $branch->setUrl(self::normalise($xmlBranch->url, 'string'));
            $branches[] = $branch;
        }

        return $branches;
    }

    /**
     * get Branch
     *
     * @param int $clientId The client ID
     *
     * @throws InvalidArgumentException
     *
     * @return Branch
     */
    public function getBranch($clientId)
    {
        if (!is_int($clientId)) {
            throw new \InvalidArgumentException('Client ID must be an integer.');
        }

        $xml = $this->execute(sprintf('branch/%s', $clientId));

        $branch = new Branch;
        $branch->setClientId($clientId);
        $branch->setFirmId(self::normalise($xml{'FirmID'}, 'int'));
        $branch->setBranchId(self::normalise($xml->{'BranchID'}, 'int'));
        $branch->setName(self::normalise($xml->name, 'string'));
        $branch->setStreet(self::normalise($xml->street, 'string'));
        $branch->setTown(self::normalise($xml->town, 'string'));
        $branch->setCounty(self::normalise($xml->county, 'string'));
        $branch->setPostcode(self::normalise($xml->postcode, 'string'));
        $branch->setPhone(self::normalise($xml->phone, 'string'));
        $branch->setEmail(self::normalise($xml->email, 'string'));

        return $branch;
    }

    /**
     * get PropertyList
     *
     * @param int $clientId The client ID
     *
     * @throws InvalidArgumentException
     *
     * @return array
     */
    public function getPropertyList($clientId)
    {
        if (!is_int($clientId)) {
            throw new \InvalidArgumentException('Client ID must be an integer.');
        }

        $properties = array();

        $xml = $this->execute(sprintf('branch/%d/property', $clientId));

        foreach ($xml->property as $xmlProperty) {
            $property = new PropertySummary;
            $property->setPropId(self::normalise($xmlProperty->{'prop_id'}, 'int'));
            $property->setLastChanged(self::normalise($xmlProperty->lastchanged, 'datetime'));
            $property->setUrl(self::normalise($xmlProperty->url, 'string'));
            $properties[] = $property;
        }

        return $properties;
    }

    /**
     * get Property
     *
     * @param int $clientId   The client ID
     * @param int $propertyId The property ID
     *
     * @throws InvalidArgumentException
     *
     * @return Property
     */
    public function getProperty($clientId, $propertyId)
    {
        if (!is_int($clientId)) {
            throw new \InvalidArgumentException('Client ID must be an integer.');
        }

        if (!is_int($propertyId)) {
            throw new \InvalidArgumentException('Property ID must be an integer.');
        }

        $xml = $this->execute(sprintf('branch/%d/property/%d', $clientId, $propertyId));

        $property = new Property;
        $property->setAttributes($xml->attributes());

        $property->setAgentReference(self::normalise($xml->reference->agents, 'string'));

        $address = new Address;
        $address
            ->setName(self::normalise($xml->address->name, 'string'))
            ->setStreet(self::normalise($xml->address->street, 'string'))
            ->setLocality(self::normalise($xml->address->locality, 'string'))
            ->setTown(self::normalise($xml->address->town, 'string'))
            ->setCounty(self::normalise($xml->address->county, 'string'))
            ->setPostcode(self::normalise($xml->address->postcode, 'string'))
            ->setCustomLocation(self::normalise($xml->address->custom_location, 'string'))
            ->setDisplay(self::normalise($xml->address->display, 'string'));

        $property->setAddress($address);

        $price = new Price(self::normalise($xml->price, 'int'));
        $price->setAttributes($xml->price->attributes());
        $property->setPrice($price);

        $property->setRmQualifier(self::normalise($xml->{'rm_qualifier'}, 'int'));
        $property->setAvailable(self::normalise($xml->available, 'string'));
        $property->setUploaded(self::normalise($xml->uploaded, 'string'));
        $property->setLongitude(self::normalise($xml->longitude, 'float'));
        $property->setLatitude(self::normalise($xml->latitude, 'float'));
        $property->setEasting(self::normalise($xml->easting, 'int'));
        $property->setNorthing(self::normalise($xml->northing, 'int'));
        $property->setWebStatus(self::normalise($xml->{'web_status'}, 'int'));
        $property->setCustomStatus(self::normalise($xml->{'custom_status'}, 'string'));
        $property->setCommRent(self::normalise($xml->{'comm_rent'}, 'string'));
        $property->setPremium(self::normalise($xml->premium, 'string'));
        $property->setServiceCharge(self::normalise($xml->{'service_charge'}, 'string'));
        $property->setRateableValue(self::normalise($xml->{'rateable_value'}, 'string'));
        $property->setType(self::normalise($xml->type, 'string'));
        $property->setFurnished(self::normalise($xml->furnished, 'int'));
        $property->setRmType(self::normalise($xml->{'rm_type'}, 'string'));
        $property->setLetBond(self::normalise($xml->{'let_bond'}, 'int'));
        $property->setRmLetTypeId(self::normalise($xml->{'rm_let_type_id'}, 'int'));
        $property->setBedrooms(self::normalise($xml->bedrooms, 'int'));
        $property->setReceptions(self::normalise($xml->receptions, 'int'));
        $property->setBathrooms(self::normalise($xml->bathrooms, 'int'));
        $property->setUserField1(self::normalise($xml->userfield1, 'string'));
        $property->setUserField2(self::normalise($xml->userfield2, 'int'));
        $property->setSoldDate(self::normalise($xml->solddate, 'datetime'));
        $property->setLeaseEnd(self::normalise($xml->leaseend, 'datetime'));
        $property->setInstructed(self::normalise($xml->instructed, 'datetime'));
        $property->setSoldPrice(self::normalise($xml->soldprice, 'int'));
        $property->setGarden(self::normalise($xml->garden, 'boolean'));
        $property->setParking(self::normalise($xml->parking, 'boolean'));
        $property->setGroundRent(self::normalise($xml->groundrent, 'string'));
        $property->setCommission(self::normalise($xml->commission, 'string'));

        $arr = array();
        foreach ($xml->area as $a) {
            $area = new Area(
                self::normalise($a->min, 'int'),
                self::normalise($a->max, 'int')
            );
            $area->setAttributes($a->attributes());
            $arr[] = $area;
        }
        $property->setArea($arr);

        $property->setDescription(self::normalise($xml->description, 'string'));

        $property->setEnergyEfficiency(
            new EnergyRatingPair(
                self::normalise($xml->hip->energy_performance->energy_efficiency->current, 'int'),
                self::normalise($xml->hip->energy_performance->energy_efficiency->potential, 'int')
            )
        );

        $property->setEnvironmentalImpact(
            new EnergyRatingPair(
                self::normalise($xml->hip->energy_performance->environmental_impact->current, 'int'),
                self::normalise($xml->hip->energy_performance->environmental_impact->potential, 'int')
            )
        );

        $arr = array();
        foreach ($xml->paragraphs->paragraph as $p) {
            $paragraph = new Paragraph;
            $paragraph->setName(self::normalise($p->name, 'string'));
            $paragraph->setFile(self::normalise($p->file, 'int'));
            $paragraph->setDimension(
                new Dimension(
                    self::normalise($p->dimensions->metric, 'string'),
                    self::normalise($p->dimensions->imperial, 'string'),
                    self::normalise($p->dimensions->mixed, 'string')
                )
            );
            $paragraph->setText(self::normalise($p->text, 'string'));
            $paragraph->setAttributes($p->attributes());
            $arr[] = $paragraph;
        }
        $property->setParagraphs($arr);

        $arr = array();
        foreach ($xml->bullets->bullet as $b) {
            $bullet = new Bullet(self::normalise($b, 'string'));
            $bullet->setAttributes($b->attributes());
            $arr[$bullet->getAttribute('id')] = $bullet;
        }
        $property->setBullets($arr);

        $arr = array();
        foreach ($xml->files->file as $f) {
            $file = new File;
            $file->setName(self::normalise($f->name, 'string'));
            $file->setUrl(self::normalise($f->url, 'string'));
            $file->setUpdated(self::normalise($f->updated, 'string'));
            $file->setAttributes($f->attributes());
            $arr[$file->getAttribute('id')] = $file;
        }
        $property->setFiles($arr);

        return $property;
    }

    /**
     * get ChangedProperties
     *
     * @param DateTime $date The changed date
     *
     * @return array
     */
    public function getChangedProperties(\DateTime $date)
    {
        $properties = array();

        $xml = $this->execute(sprintf('property/%s', $date->format('Y/m/d/H/i/s')));

        foreach ($xml->property as $xmlProperty) {
            $property = new ChangedPropertySummary;
            $property->setPropId(self::normalise($xmlProperty->propid, 'int'));
            $property->setLastChanged(self::normalise($xmlProperty->lastchanged, 'datetime'));
            $property->setLastAction(self::normalise($xmlProperty->action, 'string'));
            $property->setUrl(self::normalise($xmlProperty->url, 'string'));
            $properties[] = $property;
        }

        return $properties;
    }

    /**
     * get ChangedFiles
     *
     * @param DateTime $date The changed date
     *
     * @return array
     */
    public function getChangedFiles(\DateTime $date)
    {
        $files = array();

        $xml = $this->execute(sprintf('files/%s', $date->format('Y/m/d/H/i/s')));

        foreach ($xml->file as $xmlFile) {
            $file = new ChangedFileSummary;
            $file->setFilePropId(self::normalise($xmlFile->{'file_propid'}, 'int'));
            $file->setLastChanged(self::normalise($xmlFile->updated, 'datetime'));
            $file->setIsDeleted(self::normalise($xmlFile->deleted, 'bool'));
            $file->setUrl(self::normalise($xmlFile->url, 'string'));
            $file->setPropUrl(self::normalise($xmlFile->{'prop_url'}, 'string'));
            $files[] = $file;
        }

        return $files;
    }

    /**
     * normalise
     *
     * @param SimpleXMLElement $xml  The xml element
     * @param string           $cast The type to cast to
     *
     * @return mixed
     */
    protected static function normalise($xml, $cast = null)
    {
        if (!$xml || empty($xml)) {
            return null;
        }

        switch (strtolower($cast)) {
            case 'string':
                return (string) $xml;
            case 'integer':
            case 'int':
                return (int) $xml;
            case 'float':
                return (float) $xml;
            case 'boolean':
            case 'bool':
                return (string) $xml === 'true';
            case 'datetime':
                return new \DateTime((string) $xml);
            default:
                return $xml;
        }
    }
}
