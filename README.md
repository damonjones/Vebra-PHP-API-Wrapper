Vebra PHP API Wrapper
=====================

This is a third-party PHP library which aims to simplify the use of the Vebra XML web service.<br />
The current version of the API is version 8.<br />
NB: This library is not affiliated with [Vebra](http://vebra.com/) in any way.<br />

See [Vebra API Version 8](http://webservices.vebra.com/export/xsd/v8/exportapi.xsd) for more information.

Requirements
------------

PHP 5.3+<br />
The [Buzz](http://github.com/kriswallsmith/Buzz/) lightweight HTTP Request library.

Recommended installation method (using the Composer dependency manager)
-----------------------------------------------------------------------

If you are starting a new project, or if your existing project does not use composer, download and install it:

    curl -s http://getcomposer.org/installer | php

Create a new composer.json file with this library as a dependency:

```json
{
    "require": {
        "ydd/vebra": "*@dev"
    }
}
```

If your project is already using composer then edit the composer.json file in your project and add this library as a dependency, as shown above.

Install your project dependencies using composer:

    php composer.phar install

Require the composer autoloader in your script or bootstrap code:
```php
<?php

require 'vendor/autoload.php';
```

For more information on composer, see the [composer](http://getcomposer.org) website.

Authentication
--------------

Requests made to the webservice must be authenticated. Initially, this is done with your username and password and the webservice returns an authorisation token which must be stored and used for all subsequent requests. If you fail to store the token, you will not be able to make any further requests to the webservice until the authentication token has expired. The authentication token is valid for around an hour and the webservice will return a 401 (Not Authorised) header if you make a request with an expired authorisation token. In this case, the API will automatically re-authenticate and receive a new authentication token.

To enable this behaviour, the library includes a default token storage class which will save and load the token from a file on the local filesystem. If you want to store the token differently (for example in a database) then you can supply your own token storage class which must implement TokenStorageInterface.

Token Storage
-------------

To create an instance of \YDD\Vebra\TokenStorage\File, you pass the username and the path to the directory that you want to use to store the tokens (which should be writable). In order to support multiple users, each user has their own token file (derived from a hash of the username).

    $tokenStorage = new \YDD\Vebra\TokenStorage\File('username', __DIR__.'/tokens/');

Buzz HTTP Request Library
-------------------------

This lightweight HTTP Request library is used to send HTTP Requests to/return HTTP Responses from the webservice. Buzz has a couple of clients to choose from (FileGetContents/Curl) and others may be added in the future. You need to create an instance of the Buzz client that you want to use and an instance of the BuzzMessageFactory (used by the API to create a Response object).

Basic Usage
-----------

Now that we have the required parameters and objects, we can create an instance of the API:

    use YDD\Vebra\API as VebraAPI;
    use YDD\Vebra\TokenStorage\File as TokenStorageFile;
    use Buzz\Client\Curl as BuzzClientCurl;
    use Buzz\Message\Factory\Factory as BuzzMessageFactory;

    $api = new VebraAPI(
        'datafeedid',
        'username',
        'password',
        new TokenStorageFile('username', __DIR__.'/tokens/'),
        new BuzzClientCurl(),
        new BuzzMessageFactory()
    );

Retrieve all the branches (as an iterable collection of branch summary objects):

    $branchSummaries = $api->getBranches();

Iterate over the branch summary objects and retrieve branch objects for each one:

    foreach ($branchSummaries as $branchSummary) {
        $branch = $api->getBranch($branchSummary->getClientId());
    }

The returned branch object has accessors for each of the properties:

    echo $branch->getName();

Retrieve the properties for a given branch (as an iterable collection of property summary objects):

    $propertySummaries = $api->getPropertyList($branch->getClientId());

Iterate over the property summary objects and retrieve property objects for each one:

    foreach ($propertySummaries as $propertySummary) {
        $property = $api->getProperty($branch->getClientId(), $propertySummary->getPropId());
    }

The returned property object has accessors for each of the properties:

    echo $property->getAddress();

Retrieve properties which have changed since a given date:

    $properties = $api->getChangedProperties(new \DateTime('2012-01-01'));

Retrieve files which have changed since a given date:

    $files = $api->getChangedFiles(new \DateTime('2012-01-01'));

Authors
-------

Damon Jones - <damon@yummyduckdesign.co.uk><br />
Matthew Davis <matt@yummyduckdesign.co.uk>

License
-------

Vebra PHP API Wrapper is licensed under the MIT License - see the LICENSE file for details
