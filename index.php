<?php
/**
 * User: Elminson De Oleo Baez
 * Date: 9/15/2018
 * Time: 3:01 PM
 */
namespace Elminson\BarCode;

require_once(__DIR__ . '/vendor/autoload.php');

$barcode = new BarCode('code128');
echo $barcode->generate("lafdklkj1241kladfjs");
echo "\n";
//$barcode = new BarCode('code128b');
//echo $barcode->generate("2323");
//echo "\n";
//$barcode = new BarCode('code128a');
//echo $barcode->generate("2323");
//echo "\n";
//$barcode = new BarCode('code39');
//echo $barcode->generate("2323");
//echo "\n";
$barcode = new BarCode('code25');
echo $barcode->generate("9410243919234");
echo "\n";
//$barcode = new BarCode('codabar');
//echo $barcode->generate("2323");


