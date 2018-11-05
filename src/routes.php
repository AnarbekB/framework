<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add(
    'default',
    new Routing\Route(
        '/',
        [
            '_controller' => 'App\Controllers\DefaultController::indexAction'
        ]
    )
);

return $routes;
