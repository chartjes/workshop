<?php
namespace Workshop;

class FizzBuzz
{
    public function process($collection)
    {
        $response = [];
        foreach ($collection as $value)
        {
            $response[] = $this->parse($value);
        }

        return $response;
    }

    public function parse($value)
    {
        $response = '';

        if ($value % 3 == 0) {
            $response .= 'Fizz';
        }

        if ($value % 5 == 0) {
            $response .= 'Buzz';
        }

        if ($response == '') {
            $response = $value;
        }

        return $response;
    }
}
