TmsDocumentGeneratorSecurityBundle
=================================

Symfony2 bundle used to manage security of DocumentGenerator


Installation
------------

To install this bundle please follow these steps:

First, add the dependencies in your `composer.json` file:

```json
"repositories": [
    ...,
    {
        "type": "vcs",
        "url": "https://github.com/Tessi-Tms/TmsDocumentGeneratorSecurityBundle.git"
    }
],
"require": {
        ...,
        "tms/document-generator-security-bundle": "dev-master"
    },
```

Then, install the bundle with the command:

```sh
composer update
```

Finally, enable the bundle in your application kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        //
        new Tms\Bundle\DocumentGeneratorSecurityBundle\TmsDocumentGeneratorSecurityBundle(),
    );
}
```

Set the parameters:

``` yaml
# app/config/parameters.yml.dist and app/config/parameters.yml

parameters:
    ...

    tms_document_generator_security.security_token: '' # The given security token in order to retrieve templates salts

```
