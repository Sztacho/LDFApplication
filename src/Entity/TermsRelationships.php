<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TermsRelationshipsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TermsRelationshipsRepository::class)]
#[ORM\Table(name: 'wp_term_relationships')]
#[ORM\Index(name: 'term_taxonomy_id', columns: ['term_taxonomy_id'])]
#[ORM\Index(name: 'object_id', columns: ['object_id'])]
class TermsRelationships
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private ?int $id = null;

    #[ORM\Column(name: 'object_id')]
    private ?int $objectID = null;

    #[ORM\Column(name: 'term_taxonomy_id', type: Types::BIGINT)]
    private ?string $termTaxonomy = null;

    #[ORM\Column(name: 'term_order')]
    private ?int $termOrder = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTermTaxonomy(): ?string
    {
        return $this->termTaxonomy;
    }

    public function setTermTaxonomy(string $termTaxonomy): static
    {
        $this->termTaxonomy = $termTaxonomy;

        return $this;
    }

    public function getTermOrder(): ?int
    {
        return $this->termOrder;
    }

    public function setTermOrder(int $termOrder): static
    {
        $this->termOrder = $termOrder;

        return $this;
    }

    public function getObjectID(): ?int
    {
        return $this->objectID;
    }

    public function setObjectID(?int $objectID): static
    {
        $this->objectID = $objectID;

        return $this;
    }
}
