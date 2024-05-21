<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TermsTaxonomyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TermsTaxonomyRepository::class)]
#[ORM\Table(name: 'wp_term_taxonomy',uniqueConstraints: ['termId', 'taxonomy'])]
#[ORM\Index(name: 'taxonomy', columns: ['taxonomy'])]
#[ORM\UniqueConstraint(name: 'unique', columns: ['term_id', 'taxonomy'])]
class TermsTaxonomy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'term_taxonomy_id')]
    private ?int $id = null;

    #[ORM\Column(name: 'term_id', type: Types::BIGINT)]
    private ?string $termId = null;

    #[ORM\Column(name: 'taxonomy', length: 32)]
    private ?string $taxonomy = null;

    #[ORM\Column(name: 'description', type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(name: 'parent', type: Types::BIGINT)]
    private ?string $parent = null;

    #[ORM\Column(name: 'count', type: Types::BIGINT)]
    private ?string $count = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTermId(): ?string
    {
        return $this->termId;
    }

    public function setTermId(string $termId): static
    {
        $this->termId = $termId;

        return $this;
    }

    public function getTaxonomy(): ?string
    {
        return $this->taxonomy;
    }

    public function setTaxonomy(string $taxonomy): static
    {
        $this->taxonomy = $taxonomy;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getCount(): ?string
    {
        return $this->count;
    }

    public function setCount(string $count): static
    {
        $this->count = $count;

        return $this;
    }
}
