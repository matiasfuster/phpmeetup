<?php

namespace PHPMeetupTests\Draw;

use PHPMeetup\Draw\ProbabilityCalculator;
use PHPUnit_Framework_TestCase;

class ProbabilityCalculatorTest extends PHPUnit_Framework_TestCase
{
    
    public function testSetAttendants()
    {
        $probabilityCalculator = new ProbabilityCalculator();
        $probabilityCalculator->setAttendants(3);
        $this->assertEquals(3, $probabilityCalculator->getAttendants());
    }
    
    /**
     * @expectedException \PHPMeetup\Exception\NoAttendantsException
     */
    public function testSetAttendantsWithZeroOrLessAttendants()
    {
        $probabilityCalculator = new ProbabilityCalculator();
        $probabilityCalculator->setAttendants(0);
    }
    
    public function testCalculate()
    {
        $prizes = 1;
        $attendants = 8;
        $probabilityCalculator = new ProbabilityCalculator(1, 8);
        $elegible = $probabilityCalculator->getElegibles();
        $probability = ($prizes / $elegible);
        $this->assertEquals($probability, $probabilityCalculator->calculate());
    }

    /**
     * @expectedException \PHPMeetup\Exception\NoAttendantsException
     */
    public function testCalculateWithZeroOrLessAttendants()
    {
        $probabilityCalculator = new ProbabilityCalculator(2, 0);
        $probabilityCalculator->calculate();
    }
}