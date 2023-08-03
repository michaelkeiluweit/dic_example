<?php declare(strict_types=1);

use MichaelKeiluweit\DicExample\Container\ContainerFactory;
use MichaelKeiluweit\DicExample\Router\Router;

require_once '../vendor/autoload.php';

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;


$router = ContainerFactory::getInstance()->getContainer()->get(Router::class);
$route = $router->processRequest();

$controllerNamespace = $route->getFullQualifiedNamespacePath();
$action = $route->getAction();


$controller = ContainerFactory::getInstance()->getContainer()->get($controllerNamespace);


$controller->$action();
