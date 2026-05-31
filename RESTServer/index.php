<?php

use Slim\App;



require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/config.php';
require __DIR__ . '/app/RestServerDB.php';
require __DIR__ . '/app/RouteAction.php';



$settings = [
    'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
    ],
];




$app = new App($settings);

$action = new RouteAction();


$app->get('/games', [$action, 'getAllGames']);
$app->get('/games/{id}', [$action, 'getGameById']);
$app->post('/games', [$action, 'addGame']);
$app->get('/games/search/{keyword}', [$action, 'searchGames']);


$app->run();