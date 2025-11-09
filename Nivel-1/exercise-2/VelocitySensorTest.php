<?php
use PHPUnit\Framework\TestCase;
require 'VelocitySensor.php';

class VelocitySensorTest extends TestCase {

    public function testVerySlowSpeed()
    {
        $sensor = new VelocitySensor();
        $this->assertEquals("Very slow", $sensor->checkSpeed(0));
        $this->assertEquals("Very slow", $sensor->checkSpeed(25));
        $this->assertEquals("Very slow", $sensor->checkSpeed(29));
    }

    public function testAdequateSpeed()
    {
        $sensor = new VelocitySensor();
        $this->assertEquals("Adequate speed", $sensor->checkSpeed(30));
        $this->assertEquals("Adequate speed", $sensor->checkSpeed(45));
        $this->assertEquals("Adequate speed", $sensor->checkSpeed(60));
    }

    public function testMildExcessSpeed()
    {
        $sensor = new VelocitySensor();
        $this->assertEquals("Mild excess", $sensor->checkSpeed(61));
        $this->assertEquals("Mild excess", $sensor->checkSpeed(70));
        $this->assertEquals("Mild excess", $sensor->checkSpeed(80));
    }

    public function testModerateExcessSpeed()
    {
        $sensor = new VelocitySensor();
        $this->assertEquals("Moderate excess", $sensor->checkSpeed(81));
        $this->assertEquals("Moderate excess", $sensor->checkSpeed(90));
        $this->assertEquals("Moderate excess", $sensor->checkSpeed(100));
    }

    public function testSevereExcessSpeed()
    {
        $sensor = new VelocitySensor();
        $this->assertEquals("Severe excess", $sensor->checkSpeed(101));
        $this->assertEquals("Severe excess", $sensor->checkSpeed(150));
        $this->assertEquals("Severe excess", $sensor->checkSpeed(200));
    }
}
?>
