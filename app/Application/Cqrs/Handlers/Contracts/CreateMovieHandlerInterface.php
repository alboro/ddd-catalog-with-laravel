<?php

namespace App\Application\Cqrs\Handlers\Contracts;

use App\Application\Cqrs\Commands\CreateMovieCommand;

interface CreateMovieHandlerInterface
{
    public function handle(CreateMovieCommand $command): void;
}
