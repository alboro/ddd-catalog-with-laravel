<?php

namespace App\Application\Cqrs\Commands;

use Ramsey\Uuid\UuidInterface;

final readonly class DeleteMovieCommand
{
    public function __construct(
        public UuidInterface $id
    ) {
    }
}
