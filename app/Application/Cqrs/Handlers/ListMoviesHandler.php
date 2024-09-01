<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Assemblers\MovieAssemblerInterface;
use App\Application\Cqrs\Handlers\Contracts\ListMoviesHandlerInterface;
use App\Application\Cqrs\Handlers\Contracts\ReadMovieHandlerInterface;
use App\Application\Cqrs\Query\ListMoviesQuery;
use App\Application\Cqrs\Query\ReadMovieQuery;
use App\Application\Dto\MovieDto;
use App\Domain\Entities\Movie;
use App\Domain\Enum\SortType;
use App\Domain\Repositories\MovieRepositoryInterface;

final readonly class ListMoviesHandler implements ListMoviesHandlerInterface
{
    public function __construct(
        private MovieRepositoryInterface $repository,
        private MovieAssemblerInterface $movieAssembler,
    ) {
    }

    /**
     * @inheritdoc
     */
    public function handle(ListMoviesQuery $query): array
    {
        $movies = $this->repository->findAll(SortType::year);

        return array_map(fn (Movie $movie): MovieDto => $this->movieAssembler->createDto($movie), $movies);
    }
}
