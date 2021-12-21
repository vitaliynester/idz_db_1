<?php

namespace App\Repository;

use App\Entity\CardReception;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CardReception|null find($id, $lockMode = null, $lockVersion = null)
 * @method CardReception|null findOneBy(array $criteria, array $orderBy = null)
 * @method CardReception[]    findAll()
 * @method CardReception[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CardReceptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CardReception::class);
    }

    // /**
    //  * @return CardReception[] Returns an array of CardReception objects
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
    public function findOneBySomeField($value): ?CardReception
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
