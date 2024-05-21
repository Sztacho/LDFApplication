<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Terms;
use App\Entity\TermsMeta;
use App\Entity\TermsTaxonomy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TermsTaxonomy>
 *
 * @method TermsTaxonomy|null find($id, $lockMode = null, $lockVersion = null)
 * @method TermsTaxonomy|null findOneBy(array $criteria, array $orderBy = null)
 * @method TermsTaxonomy[]    findAll()
 * @method TermsTaxonomy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TermsTaxonomyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TermsTaxonomy::class);
    }

    public function getCategoryTerms()
    {
        return $this->createQueryBuilder('tt')
            ->select('t.name, t.slug, tm.metaValue as sortOrder')
            ->join(Terms::class, 't', 'WITH', 'tt.termId = t.id')
            ->innerJoin(TermsMeta::class, 'tm', 'WITH', 'tt.termId = tm.termId')
            ->where('tt.taxonomy = :type')
            ->andWhere('tm.metaKey = :sortOrderKey')
            ->setParameter('type', 'category')
            ->setParameter('sortOrderKey', 'sort_order')
            ->orderBy('sortOrder', 'DESC')
            ->getQuery()
            ->getResult();
    }

//    public function getCategoryTerms()
//    {
//        return $this->createQueryBuilder('t')
//            ->select('t.name, t.slug, tm.value AS sortOrder')
//            ->innerJoin('t.termMeta', 'tm') // 't.termMeta' to odnośnik do encji TermMeta z Twojej encji Term
//            ->where('t.taxonomy = :type')
//            ->andWhere('tm.metaKey = :sortOrderKey') // Zakładamy, że sortOrder jest kluczem w termMeta
//            ->setParameter('type', 'category')
//            ->setParameter('sortOrderKey', 'sort_order') // 'sort_order' to założony klucz dla metadanych sortOrder
//            ->orderBy('sortOrder', 'ASC') // Sortujemy względem wartości sortOrder
//            ->getQuery()
//            ->getResult();
//    }

}
