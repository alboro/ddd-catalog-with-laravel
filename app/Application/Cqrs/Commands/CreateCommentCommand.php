<?php

namespace App\Application\Cqrs\Commands;

use Ramsey\Uuid\UuidInterface;

final readonly class CreateCommentCommand
{
    public function __construct(
        public UuidInterface $commentId,
        public UuidInterface $movieId,
        public string $content
    ) {}
}

