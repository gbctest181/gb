<?php

namespace App\Repository;

use App\Entity\ClientFinal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ClientFinal|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientFinal|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientFinal[]    findAll()
 * @method ClientFinal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientFinalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientFinal::class);
    }

    // /**
    //  * @return ClientFinal[] Returns an array of ClientFinal objects
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
    public function findOneBySomeField($value): ?ClientFinal
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
