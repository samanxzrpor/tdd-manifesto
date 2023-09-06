<?php declare(strict_types=1);

namespace Tests\Unit;

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;
use TypeError;

class FizzBuzzTest extends TestCase
{
    public function testFizzBuzzMethodShouldThrowErrorWhenGivenNonNumberAsParameter() {
        $this->expectException(TypeError::class);
        $class = new FizzBuzz();
        $result = $class->fizzBuzz('abcd');
    }

    public function testFizzBuzzMethodShouldReturnString() {
        $class = new FizzBuzz();
        $result = $class->fizzBuzz(13);
        $this->assertIsString($result);
        $this->assertEquals($result, '13');
    }

    public function testInFizzBuzzMultiplesOfThreeInputShouldReturnFizzInsteadNumber()
    {
        $class = new FizzBuzz();
        $result = $class->fizzBuzz(9);
        $this->assertEquals('Fizz', $result);
    }

    public function testInFizzBuzzMultiplesOfFiveInputShouldReturnBuzzInsteadNumber()
    {
        $class = new FizzBuzz();
        $result = $class->fizzBuzz(10);
        $this->assertEquals('Buzz', $result);
    }

    public function testInFizzBuzzMultiplesBothOfFiveAndThreeInputShouldReturnFizzBuzzInsteadNumber()
    {
        $class = new FizzBuzz();
        $result = $class->fizzBuzz(15);
        $this->assertEquals('FizzBuzz', $result);
    }
}
