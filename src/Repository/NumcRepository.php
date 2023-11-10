<?php

namespace App\Repository;

use App\Entity\Numc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Numc>
 *
 * @method Numc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Numc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Numc[]    findAll()
 * @method Numc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NumcRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Numc::class);
    }

//    /**
//     * @return Numc[] Returns an array of Numc objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Numc
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
