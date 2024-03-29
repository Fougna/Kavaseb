<?php

namespace App\Repository;

use App\Entity\EditeurOriginal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EditeurOriginal>
 *
 * @method EditeurOriginal|null find($id, $lockMode = null, $lockVersion = null)
 * @method EditeurOriginal|null findOneBy(array $criteria, array $orderBy = null)
 * @method EditeurOriginal[]    findAll()
 * @method EditeurOriginal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditeurOriginalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EditeurOriginal::class);
    }

    public function add(EditeurOriginal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EditeurOriginal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EditeurOriginal[] Returns an array of EditeurOriginal objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EditeurOriginal
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
