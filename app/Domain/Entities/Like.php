<?php

namespace App\Domain\Entities;

use Ramsey\Uuid\UuidInterface;

class Like implements HasUuidInterface
{
    public function __construct(
        private UuidInterface $id,
        private UuidInterface $movieId,
    ) {}

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function movieId(): UuidInterface
    {
        return $this->movieId;
    }
}
