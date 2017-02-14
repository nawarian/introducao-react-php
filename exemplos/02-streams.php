<?php

require_once 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

// Lendo um arquivo muito grande podemos ver como é feito por chunks
$readStream = new React\Stream\Stream(fopen('/var/log/syslog', 'r'), $loop);
$readStream->on('data', function ($data) {
    // Sleep BLOQUEANTE para deixar explícito o funcionamento dos chunks
    sleep(1);
    echo $data . PHP_EOL;
});

$readStream->on('end', function () {
    exit(0);
});

$loop->run();
