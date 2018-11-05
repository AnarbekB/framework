<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use App\Kernel;

$request = Request::createFromGlobals();

$routes = include __DIR__.'/../src/routes.php';

$context = new Routing\RequestContext();
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$kernel = new Kernel($matcher, $controllerResolver, $argumentResolver);
$response = $kernel->handle($request);

$response->send();
