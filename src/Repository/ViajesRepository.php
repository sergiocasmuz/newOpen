<?php

namespace App\Repository;

use App\Entity\Viajes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Viajes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Viajes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Viajes[]    findAll()
 * @method Viajes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ViajesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Viajes::class);
    }

    // /**
    //  * @return Viajes[] Returns an array of Viajes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Viajes
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
