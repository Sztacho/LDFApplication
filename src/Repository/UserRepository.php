<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use App\Entity\UserMeta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function getUserList(): array
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u.displayName, u.email, u.active, u.nickname, u.roles');

        $users = $qb->getQuery()->getResult();

        // Transformacja roli użytkowników
        return array_map(function ($user) {
            $user['roles'] = $this->transformRoles($user['roles']);
            return $user;
        }, $users);
    }

    public function getUserListWithWordPressRoles(): array
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u.displayName, u.createdAt, u.email as emailMd, u.avatarPath, u.active, u.nickname, u.roles');

        return $qb->getQuery()->getResult();
    }

    private function transformWordPressRoles(string $wpRolesSerialized): array
    {
        $rolesArray = unserialize($wpRolesSerialized);
        // Zwraca tylko klucze, które są nazwami ról
        return array_keys($rolesArray);
    }

    private function transformRoles(array $roles): string
    {
        return implode(', ', $roles);
    }

}
