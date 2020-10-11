<?php

require 'vendor/autoload.php';

use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;

$config = new PhpFile('migrations.php');

$paths = [__DIR__ . '/src/Entities'];
$isDevMode = true;

$ORMconfig = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create([
    'host' => 'mysql',
    'port' => '3306',
    'driver' => 'pdo_mysql',
    'user' => $_ENV['DATABASE_USER'],
    'password' => $_ENV['DATABASE_PASSWORD'],
    'dbname' => $_ENV['DATABASE_NAME'],
    'memory' => true
], $ORMconfig);

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));
