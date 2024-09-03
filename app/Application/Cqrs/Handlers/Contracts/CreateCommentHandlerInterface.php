<?php

namespace App\Application\Cqrs\Handlers\Contracts;

use App\Application\Cqrs\Commands\CreateCommentCommand;

interface CreateCommentHandlerInterface
{
    public function handle(CreateCommentCommand $command): void;
}
