<?php

$app['twig.path'] = array(ROOT . 'views');
$app['twig.options'] = array('cache' => ROOT . 'runtime/cache/twig');

// DB connection
$dbConfig = require 'db-local.php';
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $dbConfig,
));

require 'config-local.php';
