<?php

namespace App\DataFixtures;

use App\Classes\EnumParamKey;
use App\Entity\Parameter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ParameterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $param = new Parameter();
        $param->setParamKey(EnumParamKey::SITE_NAME);
        $param->setValue("ScandiCraft");
        $param->setDescription("Nom du site internet");
        $manager->persist($param);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['base'];
    }
}
