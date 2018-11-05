<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

$request = Request::createFromGlobals();

$routes = include __DIR__.'/../src/routes.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new ControllerResolver();

$request->attributes->add($matcher->match($request->getPathInfo()));
$controller = $resolver->getController($request);

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    $controller = $resolver->getController($request);

    $response = call_user_func($request->attributes->get('_controller'), $request);
} catch (Routing\Exception\RouteNotFoundException $e) {
    $response = new Response('Not Fount', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}

$response->send();
