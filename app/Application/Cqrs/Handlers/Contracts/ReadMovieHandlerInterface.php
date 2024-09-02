<?php

namespace App\Application\Cqrs\Handlers\Contracts;

use App\Application\Cqrs\Query\ReadMovieQuery;
use App\Application\Dto\MovieDto;

interface ReadMovieHandlerInterface
{
    public function handle(ReadMovieQuery $query): MovieDto;
}
