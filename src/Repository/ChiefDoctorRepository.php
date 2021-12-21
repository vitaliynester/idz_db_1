<?php

namespace App\Repository;

use App\Entity\ChiefDoctor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChiefDoctor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChiefDoctor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChiefDoctor[]    findAll()
 * @method ChiefDoctor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChiefDoctorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChiefDoctor::class);
    }

    // /**
    //  * @return ChiefDoctor[] Returns an array of ChiefDoctor objects
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
    public function findOneBySomeField($value): ?ChiefDoctor
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
