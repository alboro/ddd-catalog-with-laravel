<?php

namespace App\Application\Assemblers;

use App\Application\Dto\CommentDto;
use App\Domain\Entities\Comment;

final class CommentAssembler implements CommentAssemblerInterface
{
    public function createDto(Comment $comment): CommentDto
    {
        return new CommentDto(
            id: $comment->id()->toString(),
            movieId: $comment->movieId()->toString(),
            content: $comment->content(),
        );
    }
}
