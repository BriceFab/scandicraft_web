<?php

namespace App\Twig;

use App\Entity\DevProgression;
use App\Repository\DevProgressionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigGlobalsExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('hasMaintenance', [$this, 'hasMaintenance']),
        ];
    }

    public function hasMaintenance()
    {
        /** @var DevProgressionRepository $repo */
        $repo = $this->em->getRepository(DevProgression::class);

        return $repo->countMaintenances() > 0;
    }
}
