<?php

namespace App\Repository;

use App\Entity\DevProgression;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DevProgression|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevProgression|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevProgression[]    findAll()
 * @method DevProgression[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevProgressionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DevProgression::class);
    }

    public function listMaintenances()
    {
        $qb = $this->createQueryBuilder('m');

        return $qb
            ->where('m.under_maintenance = :isUnderMaintenance')
            ->setParameter('isUnderMaintenance', true)
            ->orderBy('m.pourcentage', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function countMaintenances()
    {
        return count($this->listMaintenances());
    }
}
