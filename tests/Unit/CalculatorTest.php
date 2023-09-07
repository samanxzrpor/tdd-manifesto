<?php declare(strict_types=1);

namespace Tests\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;
use TypeError;

class CalculatorTest extends TestCase
{
    public function testCalculatorShouldThrowErrorWhenGivenNonStringAsParameter() {
        $this->expectException(TypeError::class);
        $calculator = new Calculator();
        $calculator->add(456);
    }
    public function testCalculatorShouldReturnZeroGivenEmptyString() {
        $calculator = new Calculator();
        $res = $calculator->add('');
        $this->assertEquals(0, $res);
    }

    public function testCalculatorShouldReturnNumberItselfWhenItsAloneInString() {
        $calculator = new Calculator();
        $res = $calculator->add('1');
        $this->assertEquals(1, $res);
    }

    public function testCalculatorShouldReturnSumOfTwoNumberInStringWhenSeparatedWithComma() {
        $calculator = new Calculator();
        $res = $calculator->add('1,9');
        $this->assertEquals(10, $res);
    }
    public function testCalculatorShouldReturnSumOfUnknownNumberInStringWhenSeparatedWithComma() {
        $calculator = new Calculator();
        $res = $calculator->add('1,9,10,26,456');
        $this->assertEquals(502, $res);
    }
    public function testCalculatorShouldReturnSumOfUnknownNumberInStringWhenSeparatedWithSeparator() {
        $calculator = new Calculator();
        $res = $calculator->add("1,\n10,26\n456");
        $this->assertEquals(493, $res);
    }
    public function testCalculatorShouldThrowExceptionGivenSeparatorInEndOfString() {
        $this->expectException(\Exception::class);
        $calculator = new Calculator();
        $res = $calculator->add("1,\n10,");
    }
    public function testCalculatorShouldReturnSumOfUnknownNumberInStringWhenSeparatedWithOtherDelimiters() {
        $calculator = new Calculator();
        $res = $calculator->add("//sep\n2sep5");
        $this->assertEquals(7, $res);
    }
    public function testCalculatorShouldThrowExceptionGivenNavigateNumbers() {
        $this->expectException(\Exception::class);
        $calculator = new Calculator();
        $res = $calculator->add("-1,\n10,-15");
    }
    public function testCalculatorShouldIgnoreNumberMoreThan1000() {
        $calculator = new Calculator();
        $res = $calculator->add("1,\n10,1000");
        $this->assertEquals(11, $res);
    }
}
