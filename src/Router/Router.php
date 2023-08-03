<?php declare(strict_types=1);


namespace MichaelKeiluweit\DicExample\Router;

use MichaelKeiluweit\DicExample\Router\Entity\Route;
use MichaelKeiluweit\DicExample\Router\Infrastructure\RouterConfig;

final class Router
{
    public function __construct(private RouterConfig $routerConfig) {}

    private function loadRouterConfig(): void
    {
        $this->routerConfig->loadConfig();
        $this->routerConfig->parseConfigFileToRoutes();
    }

    private function extractRouteAliasFromUrl(): string
    {
        $alias = array_key_first($_GET) ?? '';

        // Nothing? Call the fallback controller.
        if ($alias === '') {
            $alias = '_default';
        }

        return $alias;
    }

    public function processRequest(): Route
    {
        $this->loadRouterConfig();

        $alias = $this->extractRouteAliasFromUrl();

        // In case the alias is unknown or empty, the default alias will be used.
        if (empty($alias) || !$this->routerConfig->hasAlias($alias)) {
            $alias = $this->routerConfig->getDefaultRoute()->getAlias();
        }

        return $this->routerConfig->getRouteByAlias($alias);
    }
}
