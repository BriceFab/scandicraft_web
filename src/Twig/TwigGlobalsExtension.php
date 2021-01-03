<?php

namespace App\Twig;

use App\Classes\EnumParamKey;
use App\Entity\DevProgression;
use App\Repository\DevProgressionRepository;
use App\Service\ParameterService;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class TwigGlobalsExtension extends AbstractExtension implements GlobalsInterface
{

    private $parameterService;
    private $em;

    public function __construct(ParameterService $parameterService, EntityManagerInterface $em)
    {
        $this->parameterService = $parameterService;
        $this->em = $em;
    }

    public function getGlobals(): array
    {
        $db_params = $this->getDatabaseParams();

        return array_merge($db_params, [
            'hasMaintenance' => $this->hasMaintenance(),
        ]);
    }

    public function getDatabaseParams()
    {
        $db_params = [];

        foreach (EnumParamKey::getList() as $param_key) {
            $key = str_replace(".", "_", $param_key);
            $value = $this->parameterService->getDatabaseParam($param_key);

            $db_params[$key] = $value;
        }

        return $db_params;
    }

    public function hasMaintenance()
    {
        /** @var DevProgressionRepository $repo */
        $repo = $this->em->getRepository(DevProgression::class);

        return $repo->countMaintenances() > 0;
    }

}
