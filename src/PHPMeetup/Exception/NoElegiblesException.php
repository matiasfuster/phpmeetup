<?php

namespace PHPMeetup\Exception;

use PHPMeetup\Exception\ExceptionInterface as PHPMeetupException;

class NoElegiblesException extends \Exception implements PHPMeetupException
{
    public function __construct($message = null, $code = 0, $previous = null)
    {
        parent::__construct('No hay sorteo para los organizadores! Hay que ponerse las pilas y convocar mas gente!', $code, $previous);
    }
}
