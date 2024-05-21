<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Terms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Terms>
 *
 * @method Terms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Terms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Terms[]    findAll()
 * @method Terms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TermsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Terms::class);
    }
}
