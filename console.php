<?php

use Symfony\Component\Console\Application;

define('ROOT', __DIR__ . '/');

require __DIR__ . '/vendor/autoload.php';
$consoleApp = new Application();
require __DIR__ . '/console/config/bootstrap.php';
$consoleApp->run();