<?php

namespace App\Repository;

use App\Entity\Images;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Images|null find($id, $lockMode = null, $lockVersion = null)
 * @method Images|null findOneBy(array $criteria, array $orderBy = null)
 * @method Images[]    findAll()
 * @method Images[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Images::class);
    }

    /**
     * @param string $images_key
     * @return Images[] Returns an array of Images objects
     */
    public function findImagesByKey(string $images_key)
    {
        return $this->createQueryBuilder('i')
            ->andWhere("i.image_key LIKE :image_key")
            ->setParameter('image_key', "%$images_key%")
            ->orderBy('i.updatedAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

}
