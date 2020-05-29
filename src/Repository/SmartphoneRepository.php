<?php

namespace App\Repository;

use App\Entity\Smartphone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * @method Smartphone|null find($id, $lockMode = null, $lockVersion = null)
 * @method Smartphone|null findOneBy(array $criteria, array $orderBy = null)
 * @method Smartphone[]    findAll()
 * @method Smartphone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SmartphoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Smartphone::class);
    }

    public function findOrderByDate()
    {
        return $qb = $this
            ->createQueryBuilder('a')
            ->select('a')
            ->orderBy('a.createdAt', 'asc')
        ;
    }

    public function search($term, $order = 'asc')
    {
        $qb = $this
            ->createQueryBuilder('a')
            ->select('a')
            ->orderBy('a.title', $order)
        ;

        if ($term) {
            $qb
                ->where('a.title LIKE ?1')
                ->setParameter(1, '%' . $term . '%')
            ;
        }

        return $qb;
    }

    // /**
    //  * @return Smartphone[] Returns an array of Smartphone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Smartphone
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
