<?php

namespace App\Application\Cqrs\Commands;

use Ramsey\Uuid\UuidInterface;

final readonly class UpdateMovieCommand
{
    public function __construct(
        public UuidInterface $id,
        public string $title,
        public string $description,
        public int $year,
    ) {
    }
}
