<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TermsMeta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TermsMeta>
 *
 * @method TermsMeta|null find($id, $lockMode = null, $lockVersion = null)
 * @method TermsMeta|null findOneBy(array $criteria, array $orderBy = null)
 * @method TermsMeta[]    findAll()
 * @method TermsMeta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TermsMetaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TermsMeta::class);
    }
}
