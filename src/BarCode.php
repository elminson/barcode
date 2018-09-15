<?php

namespace Elminson\BarCode;

/**
 * Class Level
 * @package Elminson\BarCode
 */


class BarCode
{
    protected $filepath = "";
    protected $text = "0";
    protected $size = "20";
    protected $orientation = "horizontal";
    protected $code_type = "code128";
    protected $print = false;
    protected $SizeFactor = 1;
    protected $code_array = 'code128';

    public function __construct($code = 'code128')
    {
        $this->code_type = $code;
        $this->code_array = $code;
        $this->setCode_type($code);
    }

    public function getFilepath()
    {
        return $this->filepath;
    }

    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getOrientation()
    {
        return $this->orientation;
    }

    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
    }

    public function getCode_type()
    {
        return $this->code_type;
    }

    public function setCode_type($code_type)
    {
        $this->code_type = $code_type;
    }

    public function getPrint()
    {
        return $this->print;
    }

    public function setPrint($print)
    {
        $this->print = $print;
    }

    public function getSizeFactor()
    {
        return $this->SizeFactor;
    }

    public function setSizeFactor($SizeFactor)
    {
        $this->SizeFactor = $SizeFactor;
    }


    /**
     * @param $text
     */
    public function generate($text)
    {
        $this->setText($text);
        if ($this->code_type == 'code128a') {
            $this->text = strtoupper($this->text);
        }

        //if (in_array(strtolower($code_type), array("code128", "code128b"))) {
        $chksum = (new CodeType)->getChecksum($this->getCode_type());
        // Must not change order of array elements as the checksum depends on the array's key to validate final code
        $code_array = (new CodeType)->getCode($this->getCode_type());
        $code_keys = array_keys($code_array);
        $code_values = array_flip($code_keys);
        $code_string = "";
        for ($X = 1; $X <= strlen($text); $X++) {
            $activeKey = substr($text, ($X - 1), 1);
            $code_string .= $code_array[$activeKey];
            $chksum = ($chksum + ($code_values[$activeKey] * $X));
        }
        $code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];

        $code_string = "211214" . $code_string . "2331112";

    }

    function barcode(
        $filepath = "",
        $text = "0",
        $size = "20",
        $orientation = "horizontal",
        $code_type = "code128",
        $print = false,
        $SizeFactor = 1
    ) {

    }


}