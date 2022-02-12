<?php

use Crunz\Schedule;

$schedule = new Schedule();

$task = $schedule->run(function () {
});
$task
    ->daily()
    ->description('Create and Tweet.');

return $schedule;
