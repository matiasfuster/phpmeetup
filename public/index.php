<?php
include __DIR__ . "/../vendor/autoload.php";
include __DIR__ . "/config.php";

use PHPMeetup\Draw\ProbabilityCalculator;
use PHPMeetup\Exception\ExceptionInterface as PHPMeetupException;

$version = '0.1.4';

$smarty = new \Smarty;

$smarty->template_dir = __DIR__ . '/templates';
$smarty->compile_dir = __DIR__ . '/templates_c';
$smarty->cache_dir = __DIR__ . '/cache';
$smarty->config_dir = __DIR__ . '/configs';

try {
    $probabilityCalculator = new ProbabilityCalculator($prizes, $attendants);
    $probability = $probabilityCalculator->calculate();
    $elegible = $probabilityCalculator->getElegibles();
}
catch(PHPMeetupException $e) {
    $smarty->assign('error', $e->getMessage());
    $smarty->display('templates/error.tpl');
    die();
}

$draw = array(
    'prizes' => $probabilityCalculator->getPrizes(),
    'attendants' => $probabilityCalculator->getAttendants(),
    'elegible' => $probabilityCalculator->getElegibles(),
    'probability' => ($probability*100)
);

$smarty->assign('draw', $draw);
$smarty->assign('version', $version);
$smarty->display('templates/draw.tpl');
