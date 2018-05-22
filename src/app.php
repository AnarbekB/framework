<?php

use Symfony\Component\Routing;
use \Symfony\Component\HttpFoundation\Request;

$routes = new Routing\RouteCollection();
$routes->add(
    'hello',
    new Routing\Route(
        '/hello/{name}',
        [
            'name' => 'World',
            '_controller' => function (Request $request) {
                return renderTemplate($request);
            }
        ]
    )
);
$routes->add(
    'bye',
    new Routing\Route(
        'bye',
        [
            '_controller' => function (Request $request) {
                return renderTemplate($request);
            }
        ]
    )
);

return $routes;
