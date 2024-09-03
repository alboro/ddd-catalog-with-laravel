<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Cqrs\Commands\CreateCommentCommand;
use App\Application\Cqrs\Handlers\Contracts\CreateCommentHandlerInterface;
use App\Domain\Entities\Comment;
use App\Domain\Repositories\CommentRepositoryInterface;

final readonly class CreateCommentHandler implements CreateCommentHandlerInterface
{
    public function __construct(
        private CommentRepositoryInterface $commentRepository
    ) {
    }

    public function handle(CreateCommentCommand $command): void
    {
        $comment = new Comment($command->commentId, $command->movieId, $command->content);
        $this->commentRepository->save($comment);
    }
}
