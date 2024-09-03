<?php

namespace App\Application\Cqrs\Handlers\Contracts;

use App\Application\Cqrs\Commands\CreateLikeCommand;

interface CreateLikeHandlerInterface
{
    public function handle(CreateLikeCommand $command): void;
}
