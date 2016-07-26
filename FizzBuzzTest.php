<?php
require 'vendor/autoload.php';

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
    public function fizzBuzzProvider()
    {
        return [
            [[3], ['Fizz']],
            [[5], ['Buzz']],
            [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
            [
                1, 2, 'Fizz', 4, 'Buzz',
                'Fizz', 7, 8, 'Fizz', 'Buzz',
                11, 'Fizz', 13, 14, 'FizzBuzz'
            ]]
        ];
    }

    /**
     * @test
     * @dataProvider fizzBuzzProvider
     */
    public function handlesCollectionsCorrectly($collection, $expected)
    {

        $fizzBuzz = new \Workshop\FizzBuzz();
        $response = $fizzBuzz->process($collection);
        $this->assertEquals($expected, $response);
    }
}
