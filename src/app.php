<?php

use Symfony\Component\Routing;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

$routes->add(
    'leap_year',
    new Routing\Route(
        'is-leap-year/{year}',
        [
            'year' => null,
            '_controller' => function (Request $request) {
                $date = \DateTime::createFromFormat('Y', $request->attributes->get('year'));
                if (leap_year($date)) {
                    return new Response('Yep, this is a leap year!');
                }

                return new Response('Nope, this is not a leap year.');
            }
        ]
    )
);

return $routes;
