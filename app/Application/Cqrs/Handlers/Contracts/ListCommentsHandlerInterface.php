<?php

namespace App\Application\Cqrs\Handlers\Contracts;

use App\Application\Cqrs\Query\ListCommentsQuery;

interface ListCommentsHandlerInterface
{
    public function handle(ListCommentsQuery $query): array;
}
