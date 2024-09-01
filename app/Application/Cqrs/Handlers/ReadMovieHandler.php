<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Assemblers\MovieAssemblerInterface;
use App\Application\Cqrs\Handlers\Contracts\ReadMovieHandlerInterface;
use App\Application\Cqrs\Query\ReadMovieQuery;
use App\Application\Dto\MovieDto;
use App\Domain\Repositories\MovieRepositoryInterface;

final readonly class ReadMovieHandler implements ReadMovieHandlerInterface
{
    public function __construct(
        private MovieRepositoryInterface $repository,
        private MovieAssemblerInterface $movieAssembler,
    ) {
    }

    public function handle(ReadMovieQuery $command): MovieDto
    {
        $movie = $this->repository->findById($command->id);

        return $this->movieAssembler->createDto($movie);
    }
}
