<?php
use PHPUnit\Framework\TestCase;
require 'VelocitySensor.php';

class VelocitySensorTest extends TestCase {

    /**
     * @dataProvider speedTestProvider
     */
    public function testCheckSpeed($speed, $expectedResult)
    {
        $sensor = new VelocitySensor();
        $result = $sensor->checkSpeed($speed);
        $this->assertEquals($expectedResult, $result);
    }

    public static function speedTestProvider()
    {
        return [
            [0, "Too Slow"],
            [25, "Too Slow"],
            [29, "Too Slow"],
            
            [30, "Good Speed"],
            [45, "Good Speed"], 
            [60, "Good Speed"],

            [61, "Slightly Fast"],
            [70, "Slightly Fast"],
            [80, "Slightly Fast"],
            
            [81, "Too Fast"],
            [90, "Too Fast"],
            [100, "Too Fast"],
            
            [101, "Dangerous Speed"],
            [120, "Dangerous Speed"],
            [150, "Dangerous Speed"],
        ];
    }

    public function testSevereExcessSpeed()
    {
        $sensor = new VelocitySensor();
        $this->assertEquals("Dangerous Speed", $sensor->checkSpeed(101)); 
        $this->assertEquals("Dangerous Speed", $sensor->checkSpeed(150));
        $this->assertEquals("Dangerous Speed", $sensor->checkSpeed(200));
    }
}
?>