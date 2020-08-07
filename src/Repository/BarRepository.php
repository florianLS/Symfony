<?php

namespace App\Repository;

use App\Entity\Bar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bar|null findOneBy(array $criteria, array $orderBy = null) 
 * @method Bar[]    findAll()
 * @method Bar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
  //findOneBy(array('biere' => 'blonde','biere' => 'brune'))  findOneBy(array('biere' => 'blonde','biere' => 'brune'))
  //findByundeschampsdelentité() -> findByBiere()
class BarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bar::class);
    }

    public function findByRepoDeFlo($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.id = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            //->leftJoin('b.barCategories', 'bbc')
            //->addSelect('bbc')
            ->setMaxResults(10)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // /**
    //  * @return Bar[] Returns an array of Bar objects
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
    public function findOneBySomeField($value): ?Bar
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
