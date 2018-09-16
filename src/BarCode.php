<?php

namespace Elminson\BarCode;

/**
 * Class Level
 * @package Elminson\BarCode
 */


class BarCode
{
    protected $filepath = "";
    protected $file_name = null;
    protected $file = "";
    protected $text = "0";
    protected $size = "40";
    protected $orientation = "horizontal";
    protected $code_type = "code128";
    protected $print = true;
    protected $SizeFactor = 1;
    protected $code_array = 'code128';
    protected $code_string;
    protected $text_color;
    protected $bg_color;
    protected $default_text_color = '#000000';
    protected $default_bg_color = '#FFFFFF';


    public function __construct($code = 'code128')
    {
        //Validte if code exist
        //with try catch
        $this->code_type = $code;
        $this->code_array = $code;
        $this->config_code = new ConfigCode();
        list($r, $g, $b) = sscanf($this->default_bg_color, "#%02x%02x%02x");
        $this->bg_color = ['r' => $r, 'g' => $g, 'b' => $b];
        list($r, $g, $b) = sscanf($this->default_text_color, "#%02x%02x%02x");
        $this->text_color = ['r' => $r, 'g' => $g, 'b' => $b];


    }

    public function getFilepath()
    {
        return $this->filepath;
    }

    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFileName($filename)
    {
        $this->file_name = $filename;
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

    public function setTextColor($color)
    {
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        $this->text_color = ['r' => $r, 'g' => $g, 'b' => $b];
    }

    public function setBgColor($color)
    {
        list($r, $g, $b) = sscanf($color, "#%02x%02x%02x");
        $this->bg_color = ['r' => $r, 'g' => $g, 'b' => $b];
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
     * @return mixed
     */
    public function generate($text)
    {
        $this->setText($text);
        if ($this->getCode_type() == "code25") {
            $this->code_string = $this->barcode25();
        } else {
            if ($this->getCode_type() == "code39") {
                $this->code_string = $this->barcode39();
            } else {
                if ($this->getCode_type() == "codabar") {
                    $this->code_string = $this->barcodabar();
                } else {
                    $this->code_string = $this->barcodebase();
                }
            }
        }
        $this->generateBarCodeImage();

//        switch ($this->code_type) {
//            case CODE_128:
//            case CODE_128_B:
//            case CODE_128_A:
//                {
//                    $this->barcodebase();
//                    break;
//                }
//            case CODE_39:
//                {
//                    break;
//                }
//            case CODE_25:
//                {
//                    break;
//                }
//            case CODEBAR:
//                {
//                    break;
//                }
//            default:
//                {
//                    $this->barcodebase();
//                    break;
//                }
//        }

    }

    private function barcode25()
    {
        $text_size = strlen($this->text);
        $code_array = $this->config_code->getCode($this->getCode_type());
        $code_keys = array_keys($code_array);
        $code_values = array_flip($code_keys);
        //$code_array_keys = [];
        //$code_array_values = []

        $code_array_size = count($code_keys);
        $code_string = "";


        for ($X = 1; $X <= $text_size; $X++) {
            for ($Y = 0; $Y < $code_array_size; $Y++) {
                if (substr($this->text, ($X - 1), 1) == $code_keys[$Y]) {
                    $temp[$X] = $code_values[$Y];
                }
            }
        }

        for ($X = 1; $X <= $text_size; $X += 2) {
            if (isset($temp[$X]) && isset($temp[($X + 1)])) {
                $temp1 = explode("-", $temp[$X]);
                $temp2 = explode("-", $temp[($X + 1)]);
                for ($Y = 0; $Y < count($temp1); $Y++) {
                    $code_string .= $temp1[$Y] . $temp2[$Y];
                }
            }
        }

        return $this->prepareBarCode($code_string);
    }

    public function barcode39()
    {
        $upper_text = strtoupper($this->text);
        $size = strlen($upper_text);
        $code_array = $this->config_code->getCode($this->getCode_type());
        $code_string = "";
        for ($X = 1; $X <= $size; $X++) {
            $code_string .= $code_array[substr($upper_text, ($X - 1), 1)] . "1";
        }
        return $this->prepareBarCode($code_string);
    }

    private function barcodabar()
    {
        // Convert to uppercase
        $upper_text = strtoupper($this->text);
        $size = strlen($upper_text);
        $code_array = $this->config_code->getCode($this->getCode_type());
        $code_keys = array_keys($code_array);
        $code_values = array_flip($code_keys);
        $code_array_size = count($code_keys);
        $code_string = "";
        for ($X = 1; $X <= $size; $X++) {
            for ($Y = 0; $Y < $code_array_size; $Y++) {
                if (substr($upper_text, ($X - 1), 1) == $code_keys[$Y]) {
                    $code_string .= $code_values[$Y] . "1";
                }
            }
        }

        return $this->prepareBarCode($code_string);
    }

    private function barcodebase()
    {
        //code 25 and codebar are 0-9 and 0-9 A-D and some exclaamtion point
        //function to validate text.

        if ($this->code_type == 'code128a') {
            $this->text = strtoupper($this->text);
        }

        $chksum = $this->config_code->getChecksum($this->getCode_type());

        // Must not change order of array elements as the checksum depends on the array's key to validate final code
        $code_array = $this->config_code->getCode($this->getCode_type());
        // var_dump($this->getCode_type());
        //var_dump($this->config_code->getCodeString($this->getCode_type(), 'start'));
        //

        $code_keys = array_keys($code_array);
        $code_values = array_flip($code_keys);
        $size = strlen($this->text);
        $code_string = "";
        for ($X = 1; $X <= $size; $X++) {
            $activeKey = substr($this->text, ($X - 1), 1);
            $code_string .= $code_array[$activeKey];
            $chksum = ($chksum + ($code_values[$activeKey] * $X));
        }

        if ($chksum != 0) {
            $code_string .= $code_array[$code_keys[($chksum - (intval($chksum / 103) * 103))]];
        }

        return $this->prepareBarCode($code_string);
    }

    /**
     * @param $code_string
     * @return mixed
     */
    private function prepareBarCode($code_string)
    {
        return $this->config_code->getCodeString($this->code_type,
                'start') . $code_string . $this->config_code->getCodeString($this->code_type,
                'end');
    }

    public function generateBarCodeImage()
    {
        // Pad the edges of the barcode
        $code_length = 20;
        if ($this->print) {
            $text_height = 30;
        } else {
            $text_height = 0;
        }
        $code_string_len = strlen($this->code_string);

        for ($i = 1; $i <= $code_string_len; $i++) {
            $code_length = $code_length + (integer)(substr($this->code_string, ($i - 1), 1));
        }

        if (strtolower($this->orientation) == "horizontal") {
            $img_width = $code_length * $this->SizeFactor;
            $img_height = $this->size;
        } else {
            $img_width = $this->size;
            $img_height = $code_length * $this->SizeFactor;
        }

        $image = imagecreate($img_width, $img_height + $text_height);
        $black = imagecolorallocate($image, $this->text_color["r"], $this->text_color["g"], $this->text_color["b"]);
        $white = imagecolorallocate($image, $this->bg_color['r'], $this->bg_color['g'], $this->bg_color['b']);

        //Add the text to the bottom barcode
        imagefill($image, 0, 0, $white);
        if ($this->print) {
            imagestring($image, 5, 31, $img_height, $this->text, $black);
        }

        $location = 10;
        for ($position = 1; $position <= $code_string_len; $position++) {
            $cur_size = $location + (substr($this->code_string, ($position - 1), 1));
            if (strtolower($this->orientation) == "horizontal") {
                imagefilledrectangle($image, $location * $this->SizeFactor, 0, $cur_size * $this->SizeFactor,
                    $img_height,
                    ($position % 2 == 0 ? $white : $black));
            } else {
                imagefilledrectangle($image, 0, $location * $this->SizeFactor, $img_width,
                    $cur_size * $this->SizeFactor,
                    ($position % 2 == 0 ? $white : $black));
            }
            $location = $cur_size;
        }

        // Draw barcode to the screen or save in a file
        if ($this->filepath == "") {
            header('Content-type: image/png');
            imagepng($image);
            imagedestroy($image);
        } else {
            $name = rand(1000, 999999);
            if ($this->file_name != null) {
                $name = $this->file_name;
            }

            $this->file = $this->filepath . $name . ".png";
            imagepng($image, $this->file);
            imagedestroy($image);
        }
    }
}