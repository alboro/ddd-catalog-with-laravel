<?php

namespace App\Application\Transformers;

use App\Domain\Entities\Comment;

final class CommentToColumnsTransformer implements CommentToColumnsTransformerInterface
{
    public function transform(Comment $comment): array
    {
        return [
            'movie_id' => $comment->movieId()->toString(),
            'content' => $comment->content(),
        ];
    }
}
