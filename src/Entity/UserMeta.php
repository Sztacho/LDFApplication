<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UserMetaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserMetaRepository::class)]
#[ORM\Index(name: 'user_id', columns: ['user_id'])]
#[ORM\Index(name: 'meta_key', columns: ['meta_key'])]
#[ORM\Table('wp_usermeta')]
class UserMeta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "umeta_id")]
    private ?int $id = null;

    #[ORM\Column(name: "user_id", type: Types::BIGINT)]
    private ?int $user = null;

    #[ORM\Column(name: "meta_key", length: 255, nullable: true)]
    private ?string $key = null;

    #[ORM\Column(name: "meta_value", type: Types::TEXT, nullable: true)]
    private ?string $value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(int $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): static
    {
        $this->key = $key;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
