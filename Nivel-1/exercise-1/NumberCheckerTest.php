<?php
use PHPUnit\Framework\TestCase;

require_once 'NumberChecker.php';

class NumberCheckerTest extends TestCase
{
    public function testIsEvenWithEvenNumber()
    {
        $numberChecker = new NumberChecker(4);
        $this->assertTrue($numberChecker->isEven());
    }
    
    public function testIsEvenWithOddNumber()
    {
        $numberChecker = new NumberChecker(7);
        $this->assertFalse($numberChecker->isEven());
    }
    
    public function testIsPositiveWithPositiveNumber()
    {
        $numberChecker = new NumberChecker(10);
        $this->assertTrue($numberChecker->isPositive());
    }
    
    public function testIsPositiveWithNegativeNumber()
    {
        $numberChecker = new NumberChecker(-5);
        $this->assertFalse($numberChecker->isPositive());
    }
    
    public function testIsPositiveWithZero()
    {
        $numberChecker = new NumberChecker(0);
        $this->assertFalse($numberChecker->isPositive());
    }
}