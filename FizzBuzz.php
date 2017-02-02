<?php

class FizzBuzz
{
    public function process($data)
    {
        $result = [];
        foreach ($data as $item) {
            if ($item < 1 || !is_int($item)) {
                throw new Exception();
            }

            $tmp = '';

            if ($item % 3 == 0) {
                $tmp .= 'Fizz';
            }

            if ($item % 5 == 0) {
                $tmp .= 'Buzz';
            }

            if ($tmp == '') {
                $tmp = $item;
            }

            $result[] = $tmp;
        }

        return $result;
    }
}
