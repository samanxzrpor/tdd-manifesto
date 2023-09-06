<?php declare(strict_types=1);

namespace Tests\Unit;

use App\FizzBuzzClass;
use PHPUnit\Framework\TestCase;
use TypeError;

class FizzBuzzTest extends TestCase
{
    public function testFrizzBuzzMethodGivesNumberAsParameter() {
        $this->expectException(TypeError::class);
        $class = new FizzBuzzClass();
        $result = $class->fizzBuzz('abcd');
    }

    public function testFrizzBuzzMethodReturnString() {
        $class = new FizzBuzzClass();
        $result = $class->fizzBuzz(12345);
        $this->assertIsString($result);
    }

    public function testInFizzBuzzMultiplesOfThreeInputShouldReturnFizzInsteadNumber()
    {
        $class = new FizzBuzzClass();
        $result = $class->fizzBuzz(9);
        $this->assertEquals('Fizz', $result);
    }

    public function testInFizzBuzzMultiplesOfFiveInputShouldReturnBuzzInsteadNumber()
    {
        $class = new FizzBuzzClass();
        $result = $class->fizzBuzz(10);
        $this->assertEquals('Buzz', $result);
    }

    public function testInFizzBuzzMultiplesBothOfFiveAndThreeInputShouldReturnFizzBuzzInsteadNumber()
    {
        $class = new FizzBuzzClass();
        $result = $class->fizzBuzz(15);
        $this->assertEquals('FizzBuzz', $result);
    }

    public function testInFizzBuzzNotMultiplesOfFiveOrOfThreeInputShouldReturnEmptyString()
    {
        $class = new FizzBuzzClass();
        $result = $class->fizzBuzz(16);
        $this->assertEmpty($result);
    }
}
