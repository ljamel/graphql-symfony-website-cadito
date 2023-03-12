<?php

namespace App\Repository;

use App\Entity\Tmp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tmp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tmp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tmp[]    findAll()
 * @method Tmp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TmpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tmp::class);
    }

    // /**
    //  * @return Tmp[] Returns an array of Tmp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tmp
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
