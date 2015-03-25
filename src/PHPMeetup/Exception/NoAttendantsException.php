<?php

namespace PHPMeetup\Exception;

use PHPMeetup\Exception\ExceptionInterface as PHPMeetupException;

class NoAttendantsException extends \Exception implements PHPMeetupException
{
    public function __construct($message = null, $code = 0, $previous = null)
    {
        parent::__construct('No attendants, No draw!', $code, $previous);
    }
}
