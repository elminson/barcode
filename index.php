<?php
/**
 * User: Elminson De Oleo Baez
 * Date: 9/15/2018
 * Time: 3:01 PM
 */

namespace Elminson\BarCode;

require_once(__DIR__ . '/vendor/autoload.php');

$barcode = new BarCode('code128');
$barcode->setPrint(true);
$barcode->setText("testing");
$barcode->setTextColor("#ff9900");
$barcode->setBgColor("#cccccc");
$barcode->setFileName("test");
$barcode->setFilepath(__DIR__."/temp/");
echo $barcode->generate();
//$barcode = new BarCode('code128b');
//echo $barcode->generate("testing");
//echo "\n";
//$barcode = new BarCode('code128a');
//echo $barcode->generate("testing");
//echo "\n";
//$barcode = new BarCode('code39');
//echo $barcode->generate("2323");
//echo "\n";
//$barcode = new BarCode('code25');
//echo $barcode->generate("9410243919234");
//echo "\n";
//$barcode = new BarCode('codabar');
//echo $barcode->generate("2323");


