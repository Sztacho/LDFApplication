<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TermsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TermsRepository::class)]
#[ORM\Table(name: 'wp_terms')]
#[ORM\Index(name: 'slug', columns: ['slug'])]
#[ORM\Index(name: 'name', columns: ['name'])]
class Terms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'term_id')]
    private ?int $id = null;

    #[ORM\Column(name: 'name', length: 200)]
    private ?string $name = null;

    #[ORM\Column(name: 'slug', length: 200)]
    private ?string $slug = null;

    #[ORM\Column(name: 'term_group', type: Types::BIGINT)]
    private ?string $termGroup = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTermGroup(): ?string
    {
        return $this->termGroup;
    }

    public function setTermGroup(string $termGroup): static
    {
        $this->termGroup = $termGroup;

        return $this;
    }
}
