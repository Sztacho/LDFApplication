<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserMeta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserMeta>
 *
 * @method UserMeta|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserMeta|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserMeta[]    findAll()
 * @method UserMeta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserMetaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserMeta::class);
    }
}
