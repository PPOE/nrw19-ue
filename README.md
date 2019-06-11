# nrw-ue-php

## Usage

```php
require_once 'vendor/autoload.php';
require_once 'src/NrwUe.php';

echo createNrwUe($name, $birthdate, $address, $zip, $city, $region, $electionDate, $stichtag, $party, $templatePath);

```

Generate UE
``` 
php index.php > ue.pdf

``` 

Note: FPD uses ISO-8859-1/Windows-1252 as encoding. Use `utf8decode` to work with utf8 strings.
