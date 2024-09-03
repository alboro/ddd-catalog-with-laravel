<?php

namespace App\Application\Transformers;

use App\Domain\Entities\Comment;

interface CommentToColumnsTransformerInterface
{
    public function transform(Comment $comment): array;
}
