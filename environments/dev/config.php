<?php
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Symfony\Component\Debug\Debug;

// enable the debug mode
$app['debug'] = true;
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => ROOT. 'runtime/logs/dev.log',
));
$app->register(new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => ROOT . 'runtime/cache/profiler',
));

Debug::enable();