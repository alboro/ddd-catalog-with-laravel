<?php

namespace App\Application\Cqrs\Query;

use Ramsey\Uuid\UuidInterface;

final readonly class ListCommentsQuery
{
    public function __construct(public UuidInterface $movieId) {}
}
