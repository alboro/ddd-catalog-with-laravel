<?php

namespace App\Application\Cqrs\Handlers\Contracts;

use App\Application\Cqrs\Commands\DeleteMovieCommand;

interface DeleteMovieHandlerInterface
{
    public function handle(DeleteMovieCommand $command): void;
}
