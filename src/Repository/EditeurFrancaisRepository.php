<?php

namespace App\Repository;

use App\Entity\EditeurFrancais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EditeurFrancais>
 *
 * @method EditeurFrancais|null find($id, $lockMode = null, $lockVersion = null)
 * @method EditeurFrancais|null findOneBy(array $criteria, array $orderBy = null)
 * @method EditeurFrancais[]    findAll()
 * @method EditeurFrancais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditeurFrancaisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EditeurFrancais::class);
    }

    public function add(EditeurFrancais $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EditeurFrancais $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EditeurFrancais[] Returns an array of EditeurFrancais objects
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

//    public function findOneBySomeField($value): ?EditeurFrancais
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
