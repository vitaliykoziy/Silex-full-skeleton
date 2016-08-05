<?php

define('ROOT', __DIR__ . '/../');

require_once ROOT . 'vendor/autoload.php';
$app = require ROOT . 'src/app.php';
require ROOT . 'config/config.php';
require ROOT . 'src/routing.php';
$app->run();