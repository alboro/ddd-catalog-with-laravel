<?php

namespace App\Domain\Entities;

use Ramsey\Uuid\UuidInterface;

class Movie implements HasUuidInterface
{
    public function __construct(
        private UuidInterface $id,
        private string $title,
        private string $description,
        private int $year
    ) {
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function year(): int
    {
        return $this->year;
    }

    public function update(int $year, string $title, string $description): void
    {
        $this->year = $year;
        $this->title = $title;
        $this->description = $description;
    }
}
