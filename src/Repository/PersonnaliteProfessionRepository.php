<?php

namespace App\Repository;

use App\Entity\PersonnaliteProfession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PersonnaliteProfession>
 *
 * @method PersonnaliteProfession|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnaliteProfession|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnaliteProfession[]    findAll()
 * @method PersonnaliteProfession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnaliteProfessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnaliteProfession::class);
    }

    public function add(PersonnaliteProfession $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PersonnaliteProfession $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PersonnaliteProfession[] Returns an array of PersonnaliteProfession objects
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

//    public function findOneBySomeField($value): ?PersonnaliteProfession
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
