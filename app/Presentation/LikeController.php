<?php

namespace App\Presentation;

use App\Application\Cqrs\Commands\CreateLikeCommand;
use App\Application\Cqrs\Handlers\Contracts\CreateLikeHandlerInterface;
use Ramsey\Uuid\Uuid;

class LikeController extends Controller
{
    public function __construct(
        private readonly CreateLikeHandlerInterface $createLikeHandler
    ) {}

    public function store(string $movieId)
    {
        $command = new CreateLikeCommand(
            Uuid::uuid7(),
            Uuid::fromString($movieId)
        );

        $this->createLikeHandler->handle($command);

        return response()->json(['message' => 'Like added successfully.']);
    }
}
