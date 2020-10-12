<?php

use App\Handlers\CustomExceptionHandler;
use App\Manager;
use Pecee\SimpleRouter\SimpleRouter;

require_once 'vendor/autoload.php';

SimpleRouter::group(
    ['namespace' => '\App\Controllers'],
    function () {
        SimpleRouter::get('/api/', function () {
            return 'Hello world!!! =D';
        });

        SimpleRouter::post('/api/update_market', 'MarketController@updateMarket');

        SimpleRouter::post('/api/team/{userId}/{name}', 'TeamController@createTeam');

        SimpleRouter::post('/api/buy/{teamId}/{characterId}', 'MarketController@buyCharacter');

        SimpleRouter::get('/api/users', 'UserController@list');

        SimpleRouter::get('/api/team/{id}', 'TeamController@show');

        SimpleRouter::get('/api/characters', 'CharacterController@list');

        SimpleRouter::post('/api/character/{id}/min_price/{price}', 'CharacterController@setMinPrice');

        SimpleRouter::post('/api/character/{id}/max_price/{price}', 'CharacterController@setMaxPrice');

        SimpleRouter::post('/api/character/{id}/available/{state}', 'CharacterController@setAvailable');
    }
);

SimpleRouter::setDefaultNamespace('\App\Controllers');
try {
    SimpleRouter::start();
} catch (Exception $exception) {
    echo sprintf('A problem occurred 0_o!!!: %s', $exception->getMessage());
}
