<?php

namespace App\Repository;

use App\Entity\ButDeLaSemaine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ButDeLaSemaine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ButDeLaSemaine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ButDeLaSemaine[]    findAll()
 * @method ButDeLaSemaine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ButDeLaSemaineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ButDeLaSemaine::class);
    }

    // /**
    //  * @return ButDeLaSemaine[] Returns an array of ButDeLaSemaine objects
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
    public function findOneBySomeField($value): ?ButDeLaSemaine
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
