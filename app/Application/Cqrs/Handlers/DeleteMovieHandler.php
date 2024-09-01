<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Cqrs\Commands\DeleteMovieCommand;
use App\Application\Cqrs\Handlers\Contracts\DeleteMovieHandlerInterface;
use App\Domain\Repositories\MovieRepositoryInterface;

final readonly class DeleteMovieHandler implements DeleteMovieHandlerInterface
{
    public function __construct(
        private MovieRepositoryInterface $repository
    ) {
    }

    public function handle(DeleteMovieCommand $command): void
    {
        $this->repository->deleteById($command->id);
    }
}
