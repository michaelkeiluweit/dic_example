<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class ProjectServiceContainer extends Container
{
    protected $parameters = [];

    public function __construct()
    {
        $this->services = $this->privates = [];
        $this->methodMap = [
            'MichaelKeiluweit\\DicExample\\Http\\Controller\\Frontpage\\FrontpageController' => 'getFrontpageControllerService',
            'MichaelKeiluweit\\DicExample\\Http\\Controller\\Frontpage\\FrontpageWithAdvancedTemplateController' => 'getFrontpageWithAdvancedTemplateControllerService',
            'MichaelKeiluweit\\DicExample\\Http\\Controller\\Frontpage\\FrontpageWithTemplateController' => 'getFrontpageWithTemplateControllerService',
            'MichaelKeiluweit\\DicExample\\Router\\Router' => 'getRouterService',
        ];

        $this->aliases = [];
    }

    public function compile(): void
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled(): bool
    {
        return true;
    }

    public function getRemovedIds(): array
    {
        return [
            'MichaelKeiluweit\\DicExample\\Http\\TemplateAdvanced\\TemplateAdvancedService' => true,
            'MichaelKeiluweit\\DicExample\\Http\\Template\\TemplateService' => true,
            'MichaelKeiluweit\\DicExample\\Router\\Entity\\Route' => true,
            'MichaelKeiluweit\\DicExample\\Router\\Infrastructure\\RouterConfig' => true,
        ];
    }

    /**
     * Gets the public 'MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageController' shared autowired service.
     *
     * @return \MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageController
     */
    protected static function getFrontpageControllerService($container)
    {
        return $container->services['MichaelKeiluweit\\DicExample\\Http\\Controller\\Frontpage\\FrontpageController'] = new \MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageController();
    }

    /**
     * Gets the public 'MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageWithAdvancedTemplateController' shared autowired service.
     *
     * @return \MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageWithAdvancedTemplateController
     */
    protected static function getFrontpageWithAdvancedTemplateControllerService($container)
    {
        return $container->services['MichaelKeiluweit\\DicExample\\Http\\Controller\\Frontpage\\FrontpageWithAdvancedTemplateController'] = new \MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageWithAdvancedTemplateController(new \MichaelKeiluweit\DicExample\Http\TemplateAdvanced\TemplateAdvancedService(($container->privates['MichaelKeiluweit\\DicExample\\Http\\Template\\TemplateService'] ??= new \MichaelKeiluweit\DicExample\Http\Template\TemplateService())));
    }

    /**
     * Gets the public 'MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageWithTemplateController' shared autowired service.
     *
     * @return \MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageWithTemplateController
     */
    protected static function getFrontpageWithTemplateControllerService($container)
    {
        return $container->services['MichaelKeiluweit\\DicExample\\Http\\Controller\\Frontpage\\FrontpageWithTemplateController'] = new \MichaelKeiluweit\DicExample\Http\Controller\Frontpage\FrontpageWithTemplateController(($container->privates['MichaelKeiluweit\\DicExample\\Http\\Template\\TemplateService'] ??= new \MichaelKeiluweit\DicExample\Http\Template\TemplateService()));
    }

    /**
     * Gets the public 'MichaelKeiluweit\DicExample\Router\Router' shared autowired service.
     *
     * @return \MichaelKeiluweit\DicExample\Router\Router
     */
    protected static function getRouterService($container)
    {
        return $container->services['MichaelKeiluweit\\DicExample\\Router\\Router'] = new \MichaelKeiluweit\DicExample\Router\Router(new \MichaelKeiluweit\DicExample\Router\Infrastructure\RouterConfig());
    }
}
