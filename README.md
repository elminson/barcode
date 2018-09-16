# BarCode

This script that generates barcodes in four barcode formats including
Code 128, Code 39, Code 2of5, and Codabar. the options of “vertical” or “horizontal” display,
varying barcode heights, and one of four barcode formats. 

#### Require
PHP GD Library

#### Installation

```composer require elminson/barcode```

#### Basic use:
```php
namespace Elminson\BarCode;

require_once(__DIR__ . '/vendor/autoload.php');

$barcode = new BarCode('code128');
$barcode->setPrint(true);
$barcode->setTextColor("#ff9900");
$barcode->setBgColor("#cccccc");
$barcode->setFileName("test");
$barcode->setFilepath(__DIR__."/temp/");
$barcode->generate();
$barcode->SaveBarcodeToDisk();
$bardode->DestroyBarcode();
```
### Setters
* setText => text to be converte to barcode
* setPrint => Show the text in the barcode
* setBgColor => Set the barcode Background (Default white)
* setTextColor => (Default Black)
* setFileNmae => Name for the image (if empty will generate a random number)
* setFilePath => Path to save the image(if empty will show the image) 
* setOrientation  => horizontal/vertical
* setCode_type
* setSizeFactor
* setSize => Set text font size 
* SaveBarcodeToDisk => Save Barcode
* GetPngData
* DrawBarcodeToScreen
* DestroyBarcode



### Examples
Code128
![Codabar](https://github.com/elminson/barcode/blob/master/temp/code128.png)

Code128C
![Codabar](https://github.com/elminson/barcode/blob/master/temp/code128c.png)

Code128B
![Codabar](https://github.com/elminson/barcode/blob/master/temp/code128b.png)

Code28A
![Codabar](https://github.com/elminson/barcode/blob/master/temp/code128a.png)

Code39
![Codabar](https://github.com/elminson/barcode/blob/master/temp/code39.png)

Code25
![Codabar](https://github.com/elminson/barcode/blob/master/temp/code25.png)

Codabar
![Codabar](https://github.com/elminson/barcode/blob/master/temp/codabar.png)


````
php-barcode
===========

Source code for the article "How To Create Barcodes in PHP" found at: 
http://davidscotttufts.com/2009/03/31/how-to-create-barcodes-in-php/
