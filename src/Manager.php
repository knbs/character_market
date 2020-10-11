<?php

namespace App;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;

class Manager
{
    private static ?Manager $manger = null;

    private EntityManager $entityManager;

    /**
     * @throws ORMException
     */
    public function __construct()
    {
        $paths = ['/Entities'];
        $isDevMode = true;

        $dbParams = [
            'host' => 'mysql',
            'port' => '3306',
            'driver' => 'pdo_mysql',
            'user' => $_ENV['DATABASE_USER'],
            'password' => $_ENV['DATABASE_PASSWORD'],
            'dbname' => $_ENV['DATABASE_NAME'],
        ];

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
        $this->entityManager = EntityManager::create($dbParams, $config);
    }

    public static function get()
    {
        if (self::$manger === null) {
            try {
                self::$manger = new Manager();
            } catch (ORMException $exception) {
                echo $exception->getMessage();
            }
        }

        return self::$manger->entityManager;
    }
}
