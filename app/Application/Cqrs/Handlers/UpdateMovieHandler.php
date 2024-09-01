<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Cqrs\Commands\UpdateMovieCommand;
use App\Application\Cqrs\Handlers\Contracts\UpdateMovieHandlerInterface;
use App\Domain\Repositories\MovieRepositoryInterface;

final readonly class UpdateMovieHandler implements UpdateMovieHandlerInterface
{
    public function __construct(
        private MovieRepositoryInterface $repository
    ) {
    }

    public function handle(UpdateMovieCommand $command): void
    {
        $movie = $this->repository->findById($command->id);
        $movie->update($command->year, $command->title, $command->description);
        $this->repository->save($movie);
    }
}
