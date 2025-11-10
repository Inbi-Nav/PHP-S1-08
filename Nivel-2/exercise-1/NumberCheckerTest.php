<?php
use PHPUnit\Framework\TestCase;

require_once 'NumberChecker.php';

class NumberCheckerTest extends TestCase
{
    /**
     * @dataProvider evenNumberProvider
     */
    public function testIsEvenWithVariousNumbers($number, $expectedResult) 
    {
        $checker = new NumberChecker($number);
        $this->assertEquals($expectedResult, $checker->isEven());
    }

    public static function evenNumberProvider() {
        return [
            [2, true],
            [4, true],
            [0, true],
            [-2, true],
            [-4, true],
            [-8, true],
            [8, true],
            [44, true],
            [100, true],
            [1, false],
            [3, false],
            [-3, false],
            [-1, false],
            [9, false],
            [7, false]
        ];
    }

    /**
     * @dataProvider positiveNumberProvider
     */
    public function testIsPositiveWithVariousNumbers($number, $expectedResult) 
    {
        $checker = new NumberChecker($number);
        $this->assertEquals($expectedResult, $checker->isPositive());
    }

    public static function positiveNumberProvider() {
        return [
            [8, true],
            [58, true],
            [34, true],
            [77, true],
            [-11, false],
            [-39, false],
            [-54, false],
        ];
    }
}