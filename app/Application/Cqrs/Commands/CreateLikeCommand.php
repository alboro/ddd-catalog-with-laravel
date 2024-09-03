<?php

namespace App\Application\Cqrs\Commands;

use Ramsey\Uuid\UuidInterface;

final readonly class CreateLikeCommand
{
    public function __construct(
        public UuidInterface $likeId,
        public UuidInterface $movieId
    ) {}
}
