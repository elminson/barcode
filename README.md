#BarCode

This script that generates barcodes in four barcode formats including
Code 128, Code 39, Code 2of5, and Codabar. With a little over 100 lines
of code you have the options of “vertical” or “horizontal” display,
varying barcode heights, and one of four barcode formats. It does require
the GD Library to be installed as a module in PHP.

####Basic use:
```php
namespace Elminson\BarCode;

require_once(__DIR__ . '/vendor/autoload.php');

$barcode = new BarCode('code128');
$barcode->setPrint(true);
$barcode->setTextColor("#ff9900");
$barcode->setBgColor("#cccccc");
$barcode->setFileName("test");
$barcode->setFilepath(__DIR__."/temp/");
echo $barcode->generate("testing");
```




````
php-barcode
===========

Source code for the article "How To Create Barcodes in PHP" found at: 
http://davidscotttufts.com/2009/03/31/how-to-create-barcodes-in-php/
