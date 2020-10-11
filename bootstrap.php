<?php

use App\Handlers\CustomExceptionHandler;
use App\Manager;
use Pecee\SimpleRouter\SimpleRouter;

require_once 'vendor/autoload.php';

SimpleRouter::group(
    ['namespace' => '\App\Controllers', 'exceptionHandler' => CustomExceptionHandler::class],
    function () {
        SimpleRouter::get('/api/', function () {
            return 'Hello world!!! =D';
        });

        SimpleRouter::get('/api/test', function () {
            $sql = "show databases;";
            $entityManager = Manager::get();
            try {
                $stmt = $entityManager->getConnection()->prepare($sql);
                $stmt->execute();
                $all = $stmt->fetchAllAssociative();
                var_dump($all);
            } catch (\Doctrine\DBAL\Exception $exception) {
                echo $exception->getMessage();
            } catch (\Doctrine\DBAL\Driver\Exception $exception) {
                echo $exception->getMessage();
            }
        });
    }
);

SimpleRouter::setDefaultNamespace('\App\Controllers');
try {
    SimpleRouter::start();
} catch (Exception $exception) {
    echo sprintf('A problem occurred 0_o!!!: %s', $exception->getMessage());
}
