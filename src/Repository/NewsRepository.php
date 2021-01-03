<?php

namespace App\Repository;

use App\Entity\News;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method News|null find($id, $lockMode = null, $lockVersion = null)
 * @method News|null findOneBy(array $criteria, array $orderBy = null)
 * @method News[]    findAll()
 * @method News[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * @param int $max
     * @return int|mixed|string
     */
    public function findLast(int $max = 0)
    {
        $qb = $this->createQueryBuilder('n')
            ->orderBy('n.dateCreatedAt', 'DESC');

        if ($max > 0) {
            $qb->setMaxResults($max);
        }

        return $qb->getQuery()->getResult();
    }

}
