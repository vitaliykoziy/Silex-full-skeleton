<?php
use console\commands\FirstCommand;

require 'config.php';

//Migrations commands
$consoleApp->add(new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand());
$consoleApp->add(new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand());
$consoleApp->add(new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand());
$consoleApp->add(new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand());
$consoleApp->add(new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand());
$consoleApp->add(new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand());

//Custom commands
$consoleApp->add(new FirstCommand());
