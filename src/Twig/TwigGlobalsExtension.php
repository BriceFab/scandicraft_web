<?php

namespace App\Twig;

use App\Entity\DevProgression;
use App\Entity\Parameter;
use App\Repository\DevProgressionRepository;
use App\Repository\ParameterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigGlobalsExtension extends AbstractExtension
{
    private $em;
    private $parameterBag;

    public function __construct(EntityManagerInterface $em, ParameterBagInterface $parameterBag)
    {
        $this->em = $em;
        $this->parameterBag = $parameterBag;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('hasMaintenance', [$this, 'hasMaintenance']),
            new TwigFunction('getParameter', [$this, 'getParameter']),
        ];
    }

    public function hasMaintenance()
    {
        /** @var DevProgressionRepository $repo */
        $repo = $this->em->getRepository(DevProgression::class);

        return $repo->countMaintenances() > 0;
    }

    public function getParameter($key, $type = 'db')
    {
        if ($type != 'db') {
            if ($this->parameterBag->has($key)) {
                return $this->parameterBag->get($key);
            }
        } else {
            /** @var ParameterRepository $paramRepo */
            $paramRepo = $this->em->getRepository(Parameter::class);
            return $paramRepo->findActiveParam($key);
        }

        return null;
    }

}
