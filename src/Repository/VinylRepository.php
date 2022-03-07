<?php

namespace App\Repository;

use App\Entity\Vinyl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vinyl|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vinyl|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vinyl[]    findAll()
 * @method Vinyl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VinylRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vinyl::class);
    }

    // /**
    //  * @return Vinyl[] Returns an array of Vinyl objects
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
    public function findOneBySomeField($value): ?Vinyl
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function flindRand($rand){
        return $this->createQueryBuilder('v')
        ->orderBy('RAND()')
        ->setMaxResults($rand)
        ->getQuery()
        ->getResult();

        /* return $this -> getentityManager->createQuery("SELECT * FROM vinyl ORDER BY RAND() LIMIT".$rand)
        
        ->getResult();*/
      /*   $entityManager = $this->getEntityManager();
        $rq = "SELECT * FROM vinyl ORDER BY RAND() LIMIT ".$rand;
        $query = $this->entityManager->createQuery($rq);*/

    }

    public function findRecherche($recherche,$table){
        return $this->createQueryBuilder('v')
        ->andWhere('v.'.$table.' LIKE :val')
        ->setParameter('val','%'.$recherche.'%')
        ->orderBy('v.'.$table,'ASC')
        ->getQuery()
        ->getResult();
    }





}
