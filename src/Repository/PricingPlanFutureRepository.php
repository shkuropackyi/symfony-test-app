<?php

namespace App\Repository;

use App\Entity\PricingPlanFuture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PricingPlanFuture>
 *
 * @method PricingPlanFuture|null find($id, $lockMode = null, $lockVersion = null)
 * @method PricingPlanFuture|null findOneBy(array $criteria, array $orderBy = null)
 * @method PricingPlanFuture[]    findAll()
 * @method PricingPlanFuture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PricingPlanFutureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PricingPlanFuture::class);
    }

    public function save(PricingPlanFuture $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PricingPlanFuture $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PricingPlanFuture[] Returns an array of PricingPlanFuture objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PricingPlanFuture
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
