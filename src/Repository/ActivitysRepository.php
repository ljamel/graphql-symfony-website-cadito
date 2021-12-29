<?php

namespace App\Repository;

use App\Entity\Activitys;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DriverManager;

/**
 * @method Activitys|null find($id, $lockMode = null, $lockVersion = null)
 * @method Activitys|null findOneBy(array $criteria, array $orderBy = null)
 * @method Activitys[]    findAll()
 * @method Activitys[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivitysRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activitys::class);
    }

    // /**
    //  * @return Contact[] Returns an array of Contact objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contact
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function chearch($search, $ville, $prices, $entityManager)
    {
        $prices = intval($prices);
        $sql = "SELECT * FROM activitys WHERE MATCH (activitys.description) AGAINST ('$search') and activitys.ville like '%$ville%' and activitys.prices >= $prices ;";
        $stmt = $entityManager->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->executeQuery()->fetchAll();

        /*
        $dql = "SELECT p
            FROM App\Entity\Activitys p
            where p.description like :cat
            and p.ville like :ville
            and p.prices < :prices
            ORDER BY p.id ASC";
        $query = $entityManager->createQuery($dql)->setMaxResults(22);
        $query->setParameter('cat', '%' .$chearch. '%');
        $query->setParameter('ville', '%' .$ville. '%');
        $query->setParameter('prices', $prices);
        */


        return $result;
    }
}
