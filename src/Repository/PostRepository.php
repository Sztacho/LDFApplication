<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Post;
use App\Entity\PostMeta;
use App\Entity\User;
use App\Utils\PaginationDto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function getPostForCategoryWithMetaData(array $ids, PaginationDto $paginationDto): PaginationDto
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.id, p.title, p.content, p.createdAt, p.commentCount, p.name, u.email, u.avatarPath, u.displayName, pr.guid as thumbnail')
            ->innerJoin(User::class, 'u', 'WITH', 'p.author = u.id')
            ->innerJoin(PostMeta::class, 'pm', 'WITH', 'p.id = pm.postId')
            ->innerJoin(Post::class, 'pr', 'WITH', 'pr.id = pm.value')
            ->andWhere('pm.metaKey = :meta_key')
            ->andWhere('p.status = :status')
            ->setParameter('meta_key', '_thumbnail_id')
            ->setParameter('status', 'publish');


        $qb->andWhere('p.id IN (:ids)')
            ->setParameter('ids', $ids);
        $qb->addOrderBy('p.createdAt', 'DESC');

        $totalResultsQuery = clone $qb;
        $totalResults = $totalResultsQuery->select('count(p.id)')->getQuery()->getSingleScalarResult();

        $qb->setFirstResult($paginationDto->getOffset())
            ->setMaxResults($paginationDto->getLimit());

        $paginationDto->setTotal((int)$totalResults)
            ->setResults($qb->getQuery()->getResult());

        $paginationDto->setResults($qb->getQuery()->getResult());

        return $paginationDto;
    }

    public function findByWithRelationToUserAndPostMetaData(array $criteria, PaginationDto $paginationDto): PaginationDto
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('p.id, p.title, p.content, p.createdAt, p.commentCount, p.name, u.email, u.avatarPath, u.displayName, pr.guid as thumbnail')
            ->innerJoin(User::class, 'u', 'WITH', 'p.author = u.id')
            ->innerJoin(PostMeta::class, 'pm', 'WITH', 'p.id = pm.postId')
            ->innerJoin(Post::class, 'pr', 'WITH', 'pr.id = pm.value')
            ->addOrderBy("p.createdAt", 'DESC')
            ->andWhere('pm.metaKey = :meta_key')
            ->setParameter('meta_key', '_thumbnail_id');

        foreach ($criteria as $field => $value) {
            $qb->andWhere("p.$field = :$field")
                ->setParameter($field, $value);
        }

        $totalResultsQuery = clone $qb;
        $totalResults = $totalResultsQuery->select('count(p.id)')->getQuery()->getSingleScalarResult();

        $qb->setFirstResult($paginationDto->getOffset())
            ->setMaxResults($paginationDto->getLimit());


        $paginationDto->setTotal((int)$totalResults)
            ->setResults($qb->getQuery()->getResult());

        return $paginationDto;
    }

    public function findByTitleWithRelationToUserAndPostMetaData(array $criteria, array $title)
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select(
            'p.id, p.title, p.content, p.createdAt, p.commentCount, p.name, u.email, u.avatarPath, u.displayName, 
                COALESCE(pr.guid) as thumbnail'
        )
            ->innerJoin(User::class, 'u', 'WITH', 'p.author = u.id')
            ->leftJoin(PostMeta::class, 'pm', 'WITH', 'p.id = pm.postId AND pm.metaKey = :meta_key')
            ->leftJoin(Post::class, 'pr', 'WITH', 'pr.id = pm.value')
            ->addOrderBy("p.createdAt", 'DESC')
            ->andWhere('p.title LIKE :title')
            ->andWhere('p.status = :status')
            ->setParameter('title', '%' . implode('%', $title) . '%')
            ->setParameter('status', 'publish')
            ->setParameter('meta_key', '_thumbnail_id');

        foreach ($criteria as $field => $value) {
            $qb->andWhere("p.$field = :$field")
                ->setParameter($field, $value);
        }

        return $qb->getQuery()->getResult();
    }


    public function findArticleBySlug(string $name)
    {
        $qb = $this->createQueryBuilder('p');
        $qb
            ->select('p.id, p.title, p.name, p.commentCount, p.createdAt, p.content, u.displayName as author, u.avatarPath')
            ->join(User::class, 'u', 'WITH', 'p.author = u.id')
            ->andWhere('p.name = :slug')
            ->setParameter('slug', $name)
            ->setMaxResults(1);

        return $qb->getQuery()->getResult()[0] ?? null;
    }

    public function findByTitleLikePaginated($title, PaginationDto $paginationDto): PaginationDto
    {
        // Prepare the query builder with aliases and join conditions.
        $qb = $this->createQueryBuilder('p')
            ->select('p.id, p.title, u.displayName as author, u.avatarPath, p.createdAt, p.name')
            ->join(User::class, 'u', 'WITH', 'u.id = p.author') // Assume 'author' is a mapped association in the Post entity.
            ->where('p.title LIKE :title')
            ->andWhere('p.status = :status')
            ->setParameter('status', 'publish')
            ->setParameter('title', '%' . implode('%', $title) . '%')
            ->orderBy('p.createdAt', 'DESC');

        $totalResultsQuery = clone $qb;
        $totalResults = $totalResultsQuery->select('count(p.id)')->getQuery()->getSingleScalarResult();

        $qb->setFirstResult($paginationDto->getOffset())
            ->setMaxResults($paginationDto->getLimit());


        $paginationDto->setTotal((int)$totalResults)
            ->setResults($qb->getQuery()->getResult());

        return $paginationDto;
    }


    public function findAllPostForRss(array $criteria)
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.title, u.displayName as author, p.createdAt, p.name, p.content, COALESCE(pr.guid) as thumbnail')
            ->join(User::class, 'u', 'WITH', 'p.author = u.id')
            ->leftJoin(PostMeta::class, 'pm', 'WITH', 'p.id = pm.postId AND pm.metaKey = :meta_key')
            ->leftJoin(Post::class, 'pr', 'WITH', 'pr.id = pm.value')
            ->andWhere('pm.metaKey = :meta_key')
            ->setParameter('meta_key', '_thumbnail_id');

        $qb->orderBy('p.createdAt', 'DESC');
        $qb->setMaxResults(20);

        foreach ($criteria as $field => $value) {
            $qb->andWhere("p.$field = :$field")
                ->setParameter($field, $value);
        }

        return $qb->getQuery()->getResult();
    }

    public function getLatestPosts(int $limit = 6): array
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.id, p.title, p.content, pr.guid as thumbnail')
            ->innerJoin(User::class, 'u', 'WITH', 'p.author = u.id')
            ->leftJoin(PostMeta::class, 'pm', 'WITH', 'p.id = pm.postId AND pm.metaKey = :meta_key')
            ->leftJoin(Post::class, 'pr', 'WITH', 'pr.id = pm.value')
            ->andWhere('p.status = :status')
            ->andWhere('p.type = :type')
            ->setParameter('status', 'publish')
            ->setParameter('meta_key', '_thumbnail_id')
            ->setParameter('type', 'post')
            ->orderBy('p.createdAt', 'DESC')
            ->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }
}