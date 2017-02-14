<?php

require_once 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

// Timer -> One-off
$loop->addTimer(5, function () {
    // Executa depois de 5 segundos do programa.
    echo 'One-off!!' . PHP_EOL;
});

$loop->addPeriodicTimer(.5, function () {
    // Executa a cada 0,5 segundos
    echo 'Periodic timer!!!' . PHP_EOL;
});

$loop->run();
