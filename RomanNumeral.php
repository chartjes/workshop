<?php

class RomanNumeral
{
    public function process($collection)
    {
        $response = [];

        foreach ($collection as $value) {
            $response[] = $this->parse($value);
        }

        return $response;
    }

    public function parse($value)
    {
        $tmp = $value;
        $response = '';

        while ($tmp > 0) {
            switch ($tmp) {
                case ($tmp >= 50):
                    $tmp = $tmp - 50;
                    $response .= 'L';
                    break;

                case ($tmp >= 40):
                    $tmp = $tmp - 40;
                    $response .= 'XL';
                    break;

                case ($tmp >= 10):
                    $tmp = $tmp - 10;
                    $response .= 'X';
                    break;

                case ($tmp >= 9):
                    $tmp = $tmp - 9;
                    $response .= 'IX';
                    break;

                case ($tmp >= 5):
                    $tmp = $tmp - 5;
                    $response .= 'V';
                    break;

                case ($tmp >= 4):
                    $tmp = $tmp - 4 ;
                    $response .= 'IV';
                    break;

                case ($tmp > 0):
                    $tmp--;
                    $response .= 'I';
                    break;
            }
        }

        return $response;
    }
}
