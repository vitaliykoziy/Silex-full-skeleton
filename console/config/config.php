<?php
use Doctrine\DBAL\DriverManager;
use Symfony\Component\Console\Helper\HelperSet;

$dbConfig = require ROOT. 'config/db-local.php';
$dbConnection = DriverManager::getConnection($dbConfig);
// migrations config
$configFile = __DIR__ . '/migrations.yml';
$configuration = new \Doctrine\DBAL\Migrations\Configuration\YamlConfiguration($dbConnection);
$configuration->load($configFile);
$configHelper = new \Doctrine\DBAL\Migrations\Tools\Console\Helper\ConfigurationHelper($dbConnection, $configuration);

$helperSet = new HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($dbConnection),
    'configuration' => $configHelper
));
$consoleApp->setHelperSet($helperSet);