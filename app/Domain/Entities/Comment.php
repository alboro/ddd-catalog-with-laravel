<?php

namespace App\Domain\Entities;

use Ramsey\Uuid\UuidInterface;

class Comment implements HasUuidInterface
{
    public function __construct(
        private UuidInterface $id,
        private UuidInterface $movieId,
        private string $content
    ) {}

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function movieId(): UuidInterface
    {
        return $this->movieId;
    }

    public function content(): string
    {
        return $this->content;
    }
}
