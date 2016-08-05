<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

define('ROOT', __DIR__ . '/');

require ROOT . 'vendor/autoload.php';
$consoleApp = new Application();

class InitCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('run:env')
            ->setDescription('Run environment')
            ->addArgument(
                'env',
                InputArgument::REQUIRED,
                'Environment name'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $env = ROOT.'environments/' . $input->getArgument('env');
        if (!is_dir($env)) {
            throw new \Exception('Directory "' . $env . '" not found.');
        }

        $configFolder = ROOT . 'config';
        $envFiles = [
            [
                'name' => '/config.php',
                'localName' => '/config-local.php',
            ],
            [
                'name' => '/db.php',
                'localName' => '/db-local.php',
            ],
        ];

        foreach ($envFiles as $envFile) {
            if (!file_exists($env . $envFile['name'])) {
                throw new \Exception('File "' . $env . $envFile['name'] . '" not found.');
            }

            $file = fopen($configFolder . $envFile['localName'], 'w') or die('Unable to open file!');
            $content = file_get_contents($env . $envFile['name']);
            fwrite($file, $content);
            fclose($file);
        }

        $output->writeln('DONE!');
    }
}
$consoleApp->add(new InitCommand());
$consoleApp->run();