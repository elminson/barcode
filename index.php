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
$barcode->generate();
$barcode->SaveBarcodeToDisk();
$barcode->GetPngData();
$barcode->DrawBarcodeToScreen();
