<?php

use Symfony\Component\Routing;
use App\Controllers\DefaultController;

$routes = new Routing\RouteCollection();

$routes->add(
    'default',
    new Routing\Route(
        '/',
        [
            '_controller' => [new DefaultController(), 'indexAction']
        ]
    )
);

return $routes;
