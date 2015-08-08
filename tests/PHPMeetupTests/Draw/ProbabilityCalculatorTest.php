<?php

namespace PHPMeetupTests\Draw;

use PHPMeetup\Draw\ProbabilityCalculator;
use PHPUnit_Framework_TestCase;

class ProbabilityCalculatorTest extends PHPUnit_Framework_TestCase
{
    
    public function testSetAttendants()
    {
        $probabilityCalculator = new ProbabilityCalculator();
        $probabilityCalculator->setAttendants(30);
        
        $reflected = new \ReflectionClass($probabilityCalculator);
        $attendants = $reflected->getProperty('attendants');
        $attendants->setAccessible(true);
        
        $this->assertEquals(30, $attendants->getValue($probabilityCalculator));
    }
    
    public function testGetAttendants()
    {
        $probabilityCalculator = new ProbabilityCalculator();
        $probabilityCalculator->setAttendants(30);        
        $this->assertEquals(30, $probabilityCalculator->getAttendants());
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
        $prizes = 15;
        $attendants = 60;
        $probabilityCalculator = new ProbabilityCalculator($prizes, $attendants);
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