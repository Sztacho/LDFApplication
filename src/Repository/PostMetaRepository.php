<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\PostMeta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PostMeta>
 *
 * @method PostMeta|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostMeta|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostMeta[]    findAll()
 * @method PostMeta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostMetaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostMeta::class);
    }
}
