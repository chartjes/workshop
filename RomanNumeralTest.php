<?php
require 'vendor/autoload.php';
require './RomanNumeral.php';

class RomanNumeralTest extends PHPUnit_Framework_TestCase
{
    public function numeralDataProvider()
    {
        return [
            [['I', 'II', 'III', 'IV', 'V'], [1, 2, 3, 4, 5]],
            [['VI', 'VII', 'VIII', 'IX', 'X'], [6, 7, 8, 9, 10]],
            [['XLIV', 'XXVII', 'XIX'], [44, 27, 19]]
        ];
    } 

    /**
     * @test
     * @dataProvider numeralDataProvider
     */
    public function correctlyConvertsCollections($expected, $collection)
    {
        $rn = new RomanNumeral();
        $response = $rn->process($collection);
        $this->assertEquals($expected, $response);
    }
}
