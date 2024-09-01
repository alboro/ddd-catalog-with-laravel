<?php

namespace App\Application\Cqrs\Handlers\Contracts;

use App\Application\Cqrs\Commands\UpdateMovieCommand;

interface UpdateMovieHandlerInterface
{
    public function handle(UpdateMovieCommand $command): void;
}
