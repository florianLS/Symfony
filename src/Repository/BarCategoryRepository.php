<?php

namespace App\Repository;

use App\Entity\BarCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BarCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method BarCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method BarCategory[]    findAll()
 * @method BarCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BarCategory::class);
    }

    // /**
    //  * @return BarCategory[] Returns an array of BarCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BarCategory
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
