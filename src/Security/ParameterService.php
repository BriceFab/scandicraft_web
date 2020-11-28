<?php

namespace App\Security;

use App\Repository\ParameterRepository;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ParameterService
{
    private $parameterBag;
    private $parameterRepository;

    public function __construct(ParameterBagInterface $parameterBag, ParameterRepository $parameterRepository)
    {
        $this->parameterBag = $parameterBag;
        $this->parameterRepository = $parameterRepository;
    }

    public function getDatabaseParam(string $paramKey)
    {
        $databaseParam = $this->parameterRepository->findActiveParam($paramKey);
        if (!is_null($databaseParam)) {
            return $databaseParam;
        } else {
            return $paramKey;
        }
    }

    public function getParam(string $key)
    {
        if ($this->parameterBag->has($key)) {
            return $this->parameterBag->get($key);
        }

        return null;
    }

}
