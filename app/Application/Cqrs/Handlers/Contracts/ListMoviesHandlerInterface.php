<?php

namespace App\Application\Cqrs\Handlers\Contracts;

use App\Application\Cqrs\Query\ListMoviesQuery;
use App\Application\Dto\MovieDto;

interface ListMoviesHandlerInterface
{
    /**
     * @return array<MovieDto>
     */
    public function handle(ListMoviesQuery $query): array;
}
