<?php

namespace App\Repository;

use App\Entity\PatientCard;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PatientCard|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatientCard|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatientCard[]    findAll()
 * @method PatientCard[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientCardRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatientCard::class);
    }

    // /**
    //  * @return PatientCard[] Returns an array of PatientCard objects
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
    public function findOneBySomeField($value): ?PatientCard
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
