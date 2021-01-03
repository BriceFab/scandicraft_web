<?php

namespace App\Repository;

use App\Entity\Spoil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Spoil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Spoil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Spoil[]    findAll()
 * @method Spoil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpoilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Spoil::class);
    }

    /**
     * @param int $max
     * @return int|mixed|string
     */
    public function findLast(int $max = 0)
    {
        $qb = $this->createQueryBuilder('s')
            ->orderBy('s.dateCreatedAt', 'DESC');

        if ($max > 0) {
            $qb->setMaxResults($max);
        }

        return $qb->getQuery()->getResult();
    }
}
