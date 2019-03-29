<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    // /**
    //  * @return Event[] Returns an array of Event objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Event
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function search( $query, $sort ){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->where( 'e.name LIKE :query' );
        
        $stmt->setParameter( ':query', '%' . $query . '%' );
        
        $stmt->orderBy( 'e.' . $sort, 'DESC' );

        return $stmt->getQuery()->getResult();
    }
 /*   public function come($event)
    {
        $stmt = $this->createQueryBuilder('m');
        $stmt->Where('m.event LIKE :term');
        $stmt->setParameter(':term', '%'. $event . '%');
         return $stmt->getQuery()->getResult($event);
    } */

    public function countIncoming(){
        $stmt = $this->createQueryBuilder( 'e' );
        $stmt->select( 'COUNT( e )' );
        $stmt->where( 'e.startAt > CURRENT_TIMESTAMP()' );
        return $stmt->getQuery()->getSingleScalarResult();
    }

    
        
       
    

}