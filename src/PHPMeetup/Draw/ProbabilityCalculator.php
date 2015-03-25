<?php

namespace PHPMeetup\Draw;

use PHPMeetup\Exception\NoAttendantsException;
use PHPMeetup\Exception\NoElegiblesException;

class ProbabilityCalculator
{
    private $prizes;
    private $attendants;

    public function getPrizes()
    {
        return $this->prizes;
    }
    public function getAttendants()
    {
        return $this->attendants-3;
    }

    public function setPrizes($prizes = 1)
    {
        $this->prizes = $prizes;
    }
    public function setAttendants($attendants)
    {

        if (is_numeric($attendants) && $attendants <= 0) {
            throw new NoAttendantsException();
        }
        $this->attendants = $attendants;
    }

    public function __construct($prizes = null, $attendants = null)
    {
        $this->setPrizes($prizes);
        $this->setAttendants($attendants);
    }
    
    public function getElegibles() {
        return $this->attendants;
    }
    
    public function calculate()
    {
        if ($this->attendants <= 0) {
            throw new NoAttendantsException();
        }
        $elegible = $this->getElegibles();
        if ($elegible <= 0) {
            throw new NoElegiblesException();
        }
        return ($this->prizes / $elegible);
    }
}