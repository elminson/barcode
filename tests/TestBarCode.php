<?php
/**
 * User: Elminson De Oleo Baez
 * Date: 9/15/2018
 * Time: 10:22 AM
 */

namespace Elminson\BarCode\Tests;

use Elminson\BarCode\BarCode;
use PHPUnit\Framework\TestCase;

class TestBarCode extends TestCase
{
    public function testBarCode128()
    {
        $barcode = new BarCode('code128');
        $barcode->setPrint(true);
        $barcode->setText("testing");
        $barcode->setSizeFactor(3);
        $barcode->setTextColor("#000000");
        $barcode->setBgColor("#FFFFFF");
        $barcode->setFilepath(__DIR__ . '\..\temp\\');
        $barcode->setFileName("code128");
        $barcode->generate("testing");
        $this->assertEquals(__DIR__ . '\..\temp\\code128.png', $barcode->getFile());

    }

    public function testBarCode128B()
    {
        $barcode = new BarCode('code128b');
        $barcode->setPrint(true);
        $barcode->setText("testing");
        $barcode->setSizeFactor(3);
        $barcode->setTextColor("#000000");
        $barcode->setBgColor("#FFFFFF");
        $barcode->setFilepath(__DIR__ . '\..\temp\\');
        $barcode->setFileName("code128b");
        $barcode->generate("testing");
        $this->assertEquals(__DIR__ . '\..\temp\\code128b.png', $barcode->getFile());

    }

    public function testBarCode128A()
    {
        $barcode = new BarCode('code128a');
        $barcode->setPrint(true);
        $barcode->setText("testing");
        $barcode->setSizeFactor(3);
        $barcode->setTextColor("#000000");
        $barcode->setBgColor("#FFFFFF");
        $barcode->setFilepath(__DIR__ . '\..\temp\\');
        $barcode->setFileName("code128a");
        $barcode->generate();
        $this->assertEquals(__DIR__ . '\..\temp\\code128a.png', $barcode->getFile());

    }

    public function testBarCode39()
    {
        $barcode = new BarCode('code39');
        $barcode->setPrint(true);
        $barcode->setText("12345678");
        $barcode->setSizeFactor(3);
        $barcode->setTextColor("#000000");
        $barcode->setBgColor("#FFFFFF");
        $barcode->setFilepath(__DIR__ . '\..\temp\\');
        $barcode->setFileName("code39");
        $barcode->generate();
        $this->assertEquals(__DIR__ . '\..\temp\\code39.png', $barcode->getFile());

    }

    public function testBarCode25()
    {
        $barcode = new BarCode('code25');
        $barcode->setPrint(true);
        $barcode->setText("12345678");
        $barcode->setSizeFactor(3);
        $barcode->setTextColor("#000000");
        $barcode->setBgColor("#FFFFFF");
        $barcode->setFilepath(__DIR__ . '\..\temp\\');
        $barcode->setFileName("code25");
        $barcode->generate();
        $this->assertEquals(__DIR__ . '\..\temp\\code25.png', $barcode->getFile());

    }

    public function testBarCodabar()
    {
        $barcode = new BarCode('codabar');
        $barcode->setPrint(true);
        $barcode->setText("12345678");
        $barcode->setSizeFactor(3);
        $barcode->setTextColor("#000000");
        $barcode->setBgColor("#FFFFFF");
        $barcode->setFilepath(__DIR__ . '\..\temp\\');
        $barcode->setFileName("codabar");
        $barcode->generate();
        $this->assertEquals(__DIR__ . '\..\temp\\codabar.png', $barcode->getFile());

    }
}