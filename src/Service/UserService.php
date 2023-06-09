<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function countRegisterUsers()
    {
        /** @var UserRepository $repo */
        $repo = $this->em->getRepository(User::class);

        return $repo->countUsers();
    }

    public function countOnlineUsers()
    {
        return 0;
    }

    public function onlineUsersString() {
        $nbr_users = $this->countOnlineUsers();
        $str_users = $nbr_users > 0 ? 'connectés' : 'connecté';
        return "$nbr_users $str_users";
    }

}
