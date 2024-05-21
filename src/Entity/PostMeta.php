<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PostMetaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostMetaRepository::class)]
#[ORM\Index(name: 'post_id', columns: ['post_id'])]
#[ORM\Index(name: 'meta_key', columns: ['meta_key'])]
#[ORM\Table(name: 'wp_postmeta')]
class PostMeta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "meta_id")]
    private ?int $id = null;

    #[ORM\Column(name: "post_id", type: Types::BIGINT)]
    private ?string $postId = null;

    #[ORM\Column(name: "meta_key", length: 255, nullable: true)]
    private ?string $metaKey = null;

    #[ORM\Column(name: "meta_value", type: Types::TEXT, nullable: true)]
    private ?string $value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostId(): ?string
    {
        return $this->postId;
    }

    public function setPostId(string $postId): static
    {
        $this->postId = $postId;

        return $this;
    }

    public function getMetaKey(): ?string
    {
        return $this->metaKey;
    }

    public function setMetaKey(?string $metaKey): static
    {
        $this->metaKey = $metaKey;

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
