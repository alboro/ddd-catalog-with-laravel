<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Cqrs\Commands\CreateLikeCommand;
use App\Application\Cqrs\Handlers\Contracts\CreateLikeHandlerInterface;
use App\Domain\Entities\Like;
use App\Domain\Repositories\LikeRepositoryInterface;

final readonly class CreateLikeHandler implements CreateLikeHandlerInterface
{
    public function __construct(
        private LikeRepositoryInterface $likeRepository
    ) {
    }

    public function handle(CreateLikeCommand $command): void
    {
        $like = new Like($command->likeId, $command->movieId);
        $this->likeRepository->save($like);
    }
}
