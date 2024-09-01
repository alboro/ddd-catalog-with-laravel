<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Cqrs\Commands\CreateMovieCommand;
use App\Application\Cqrs\Handlers\Contracts\CreateMovieHandlerInterface;
use App\Domain\Entities\Movie;
use App\Domain\Repositories\MovieRepositoryInterface;

final readonly class CreateMovieHandler implements CreateMovieHandlerInterface
{
    public function __construct(
        private MovieRepositoryInterface $repository,
    ) {
    }

    public function handle(CreateMovieCommand $command): void
    {
        $movie = new Movie(
            $command->id,
            $command->title,
            $command->description,
            $command->year
        );
        $this->repository->save($movie);
    }
}
