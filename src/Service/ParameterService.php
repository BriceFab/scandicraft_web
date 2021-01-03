<?php

namespace App\Service;

use App\Classes\EnumParamProviderType;
use App\Entity\Parameter;
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

    public function getParamFromType(string $key, string $type) {
        if ($type === EnumParamProviderType::DATABASE) {
            return $this->getDatabaseParam($key);
        } else {
            if ($this->parameterBag->has($key)) {
                return $this->parameterBag->get($key);
            }
        }

        return null;
    }

}
