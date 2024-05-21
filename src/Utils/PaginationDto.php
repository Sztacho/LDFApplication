<?php

declare(strict_types=1);

namespace App\Utils;

class PaginationDto
{
    public const DEFAULT_OFFSET = 0;
    public const DEFAULT_LIMIT = 20;

    private int $offset;

    private int $limit;

    public function __construct(
        int $offset = self::DEFAULT_OFFSET,
        int $limit = self::DEFAULT_LIMIT,
        private int $total = 1,
        private array $results = []
    ) {
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): PaginationDto
    {
        $this->total = $total;

        return $this;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): PaginationDto
    {
        $this->offset = $offset;

        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): PaginationDto
    {
        $this->limit = $limit;

        return $this;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function setResults(array $results): PaginationDto
    {
        $this->results = $results;

        return $this;
    }
}