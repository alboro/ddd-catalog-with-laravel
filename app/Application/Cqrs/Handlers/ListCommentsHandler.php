<?php

namespace App\Application\Cqrs\Handlers;

use App\Application\Assemblers\CommentAssemblerInterface;
use App\Application\Cqrs\Handlers\Contracts\ListCommentsHandlerInterface;
use App\Application\Cqrs\Query\ListCommentsQuery;
use App\Application\Dto\CommentDto;
use App\Domain\Entities\Comment;
use App\Domain\Repositories\CommentRepositoryInterface;

final readonly class ListCommentsHandler implements ListCommentsHandlerInterface
{
    public function __construct(
        private CommentRepositoryInterface $commentRepository,
        private CommentAssemblerInterface $commentAssembler,
    ) {}

    public function handle(ListCommentsQuery $query): array
    {
        $comments = $this->commentRepository->findByMovieId($query->movieId);

        return array_map(fn (Comment $comment): CommentDto => $this->commentAssembler->createDto($comment), $comments);
    }
}
