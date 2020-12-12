<?php

namespace App\Twig;

use Symfony\Component\Routing\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigFunctionsExtension extends AbstractExtension
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('checkRouteExists', [$this, 'checkRouteExists']),
        ];
    }

    public function checkRouteExists($route_name)
    {
        return ($this->router->getRouteCollection()->get($route_name) !== null);
    }

}
