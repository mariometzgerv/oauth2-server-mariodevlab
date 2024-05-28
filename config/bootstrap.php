<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use DI\Container;
use Slim\Factory\AppFactory;

// Load ENV Variables
Dotenv::createImmutable(__DIR__ . '/../secrets/')->load();

// Load Dependency Containers
$container = new Container;
$dependencies = glob(__DIR__ . '/../dependencies/*.php');
foreach ($dependencies as $dependency) (require_once $dependency)($container);

// Create App
$app = AppFactory::createFromContainer($container);
$app->setBasePath('/api');
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

// Load App Routes
$routes = glob(__DIR__ . '/../routes/*.php');
foreach ($routes as $route) (require_once $route)($app);

// Run App
$app->run();
