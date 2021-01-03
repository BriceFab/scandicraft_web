<?php

namespace App\Twig;

use App\Classes\EnumParamProviderType;
use App\Service\ParameterService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigFunctionsExtension extends AbstractExtension
{
    private $router;
    private $em;
    private $parameterService;

    public function __construct(RouterInterface $router, EntityManagerInterface $em, ParameterService $parameterService)
    {
        $this->router = $router;
        $this->em = $em;
        $this->parameterService = $parameterService;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('checkRouteExists', [$this, 'checkRouteExists']),
            new TwigFunction('getParameter', [$this, 'getParameter']),
        ];
    }

    public function checkRouteExists($route_name)
    {
        return ($this->router->getRouteCollection()->get($route_name) !== null);
    }

    public function getParameter($key, $type = EnumParamProviderType::ENVIRONNEMENT)
    {
        return $this->parameterService->getParamFromType($key, $type);
    }

}
