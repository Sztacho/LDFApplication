<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TermsMetaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TermsMetaRepository::class)]
#[ORM\Table(name: 'wp_termmeta')]
#[ORM\Index(name: 'term_id', columns: ['term_id'])]
#[ORM\Index(name: 'meta_key', columns: ['meta_key'])]
class TermsMeta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'meta_id')]
    private ?int $id = null;

    #[ORM\Column(name: 'term_id', type: Types::BIGINT)]
    private ?string $termId = null;

    #[ORM\Column(name: 'meta_key', length: 255)]
    private ?string $metaKey = null;

    #[ORM\Column(name: 'meta_value', type: Types::TEXT)]
    private ?string $metaValue = null;

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

    public function getMetaKey(): ?string
    {
        return $this->metaKey;
    }

    public function setMetaKey(string $metaKey): static
    {
        $this->metaKey = $metaKey;

        return $this;
    }

    public function getMetaValue(): ?string
    {
        return $this->metaValue;
    }

    public function setMetaValue(string $metaValue): static
    {
        $this->metaValue = $metaValue;

        return $this;
    }
}
