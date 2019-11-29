<?php

namespace App\Repository;

use App\Entity\Procesverbal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Procesverbal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Procesverbal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Procesverbal[]    findAll()
 * @method Procesverbal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProcesverbalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Procesverbal::class);
    }

    // /**
    //  * @return Procesverbal[] Returns an array of Procesverbal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Procesverbal
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
