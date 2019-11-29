<?php

namespace App\Repository;

use App\Entity\BonIntervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method BonIntervention|null find($id, $lockMode = null, $lockVersion = null)
 * @method BonIntervention|null findOneBy(array $criteria, array $orderBy = null)
 * @method BonIntervention[]    findAll()
 * @method BonIntervention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BonInterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BonIntervention::class);
    }

    // /**
    //  * @return BonIntervention[] Returns an array of BonIntervention objects
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
    public function findOneBySomeField($value): ?BonIntervention
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
