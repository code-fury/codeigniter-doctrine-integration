<?php

define('APPPATH', dirname(__FILE__) . '/');
define('BASEPATH', APPPATH . '/../system/');
define('ENVIRONMENT', 'development');

chdir(APPPATH);

require __DIR__ . '/libraries/Doctrine.php';
use Symfony\Component\Console\Application;

foreach ($GLOBALS as $helperSetCandidate) {
    if ($helperSetCandidate instanceof \Symfony\Component\Console\Helper\HelperSet) {
        $helperSet = $helperSetCandidate;
        break;
    }
}

$doctrine = new Doctrine;
$em = $doctrine->em;

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em),
    'dialog' => new \Symfony\Component\Console\Helper\DialogHelper(),

));

// replace the ConsoleRunner::run() statement with:
$cli = new Application('Doctrine Command Line Interface', \Doctrine\ORM\Version::VERSION);
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);
// Register All Doctrine Commands
\Doctrine\ORM\Tools\Console\ConsoleRunner::addCommands($cli);

// Register your own command
$cli->addCommands(array(
    // Migrations Commands
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),
    new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand()
));

// Runs console application
$cli->run();