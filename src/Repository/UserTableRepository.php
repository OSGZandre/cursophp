<?php

namespace App\Repository;

use App\Entity\UserTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserTable>
 *
 * @method UserTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserTable[]    findAll()
 * @method UserTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserTable::class);
    }

    public function add(UserTable $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UserTable $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('u')
            ->getQuery()
            ->getResult();
    }

    /**public function findById(int $id): UserTable {
        return $this->getEntityManager()->find(UserTable::class, $id);
     }

     public function lis
     $sql = "SELECT id, name, email, telephoneNumber, isAdmin
        FROM userTable
        WHERE ";

	$query = $this->db->query($sql);
	$this->db->close();
	
	return $query;
    
//    /**
//     * @return UserTable[] Returns an array of UserTable objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserTable
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
