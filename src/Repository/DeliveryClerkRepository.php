<?php

namespace App\Repository;

use App\Entity\DeliveryClerk;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeliveryClerk|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeliveryClerk|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeliveryClerk[]    findAll()
 * @method DeliveryClerk[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeliveryClerkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeliveryClerk::class);
    }

    // /**
    //  * @return DeliveryClerk[] Returns an array of DeliveryClerk objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DeliveryClerk
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
