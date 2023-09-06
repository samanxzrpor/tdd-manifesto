<?php declare(strict_types=1);

namespace App;


class FizzBuzzClass
{
    public function fizzBuzz(int $num): string {
        
        if ($num % 5 == 0 && $num % 3 == 0) {
            return 'FizzBuzz';
        } else if ($num % 3 == 0) {
            return 'Fizz';
        } else if ($num % 5 == 0) {
            return 'Buzz';
        } else {
            return '';
        }
    }
}
