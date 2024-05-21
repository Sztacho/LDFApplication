<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PostRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
#[ORM\Table(name: 'wp_posts')]
#[ORM\Index(name: 'post_name', columns: ['post_name'])]
#[ORM\Index(name: 'type_status_date', columns: ['post_type', 'post_status', 'post_date', 'ID'])]
#[ORM\Index(name: 'post_parent', columns: ['post_parent'])]
#[ORM\Index(name: 'post_author', columns: ['post_author'])]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id")]
    private ?int $id = null;

    #[ORM\Column(name: "post_author", type: Types::BIGINT)]
    private ?string $author = null;

    #[ORM\Column(name: "post_date", type: Types::DATETIME_MUTABLE, nullable: true, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?DateTime $createdAt = null;

    #[ORM\Column(name: "post_date_gmt", type: Types::DATETIME_MUTABLE, nullable: true, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?DateTime $createdAtGmt = null;

    #[ORM\Column(name: "post_content", type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(name: "post_title", type: Types::TEXT)]
    private ?string $title = null;

    #[ORM\Column(name: "post_excerpt", type: Types::TEXT)]
    private ?string $excerpt = null;

    #[ORM\Column(name: "post_status", length: 20)]
    private ?string $status = null;

    #[ORM\Column(name: "comment_status", length: 20)]
    private ?string $commandStatus = null;

    #[ORM\Column(name: "ping_status", length: 20)]
    private ?string $pingStatus = null;

    #[ORM\Column(name: "post_password", length: 255)]
    private ?string $password = null;

    #[ORM\Column(name: "post_name", length: 200)]
    private ?string $name = null;

    #[ORM\Column(name: "to_ping", type: Types::TEXT)]
    private ?string $ping = null;

    #[ORM\Column(name: "pinged", type: Types::TEXT)]
    private ?string $pinged = null;

    #[ORM\Column(name: "post_modified", type: Types::DATETIME_MUTABLE, nullable: true, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?DateTime $updatedAt = null;

    #[ORM\Column(name: "post_modified_gmt", type: Types::DATETIME_MUTABLE, nullable: true, options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?DateTime $updatedAtGmt = null;

    #[ORM\Column(name: "post_content_filtered", type: Types::TEXT)]
    private ?string $contentFiltered = null;

    #[ORM\Column(name: "post_parent", type: Types::BIGINT)]
    private ?string $parent = null;

    #[ORM\Column(name: "guid", length: 255)]
    private ?string $guid = null;

    #[ORM\Column(name: "post_type", length: 20)]
    private ?string $type = null;

    #[ORM\Column(name: "post_mime_type", length: 100)]
    private ?string $mimeType = null;

    #[ORM\Column(name: "comment_count", type: Types::BIGINT)]
    private ?string $commentCount = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAtGmt(): ?DateTime
    {
        return $this->createdAtGmt;
    }

    public function setCreatedAtGmt(DateTime $createdAtGmt): static
    {
        $this->createdAtGmt = $createdAtGmt;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(string $excerpt): static
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCommandStatus(): ?string
    {
        return $this->commandStatus;
    }

    public function setCommandStatus(string $commandStatus): static
    {
        $this->commandStatus = $commandStatus;

        return $this;
    }

    public function getPingStatus(): ?string
    {
        return $this->pingStatus;
    }

    public function setPingStatus(string $pingStatus): static
    {
        $this->pingStatus = $pingStatus;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPing(): ?string
    {
        return $this->ping;
    }

    public function setPing(string $ping): static
    {
        $this->ping = $ping;

        return $this;
    }

    public function getPinged(): ?string
    {
        return $this->pinged;
    }

    public function setPinged(string $pinged): static
    {
        $this->pinged = $pinged;

        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUpdatedAtGmt(): ?DateTime
    {
        return $this->updatedAtGmt;
    }

    public function setUpdatedAtGmt(DateTime $updatedAtGmt): static
    {
        $this->updatedAtGmt = $updatedAtGmt;

        return $this;
    }

    public function getContentFiltered(): ?string
    {
        return $this->contentFiltered;
    }

    public function setContentFiltered(string $contentFiltered): static
    {
        $this->contentFiltered = $contentFiltered;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(string $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function setGuid(string $guid): static
    {
        $this->guid = $guid;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): static
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    public function getCommentCount(): ?string
    {
        return $this->commentCount;
    }

    public function setCommentCount(string $commentCount): static
    {
        $this->commentCount = $commentCount;

        return $this;
    }
}
