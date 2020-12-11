<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('bricefab123@gmail.com');
        $user->setUsername('BriceFab');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'password'
        ));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setHasConfirmEmail(true);
        $manager->persist($user);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['user'];
    }
}
