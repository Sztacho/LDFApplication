<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\TermsRelationships;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TermsRelationships>
 *
 * @method TermsRelationships|null find($id, $lockMode = null, $lockVersion = null)
 * @method TermsRelationships|null findOneBy(array $criteria, array $orderBy = null)
 * @method TermsRelationships[]    findAll()
 * @method TermsRelationships[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TermsRelationshipsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TermsRelationships::class);
    }
}
