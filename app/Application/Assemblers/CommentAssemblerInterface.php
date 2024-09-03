<?php

namespace App\Application\Assemblers;

use App\Application\Dto\CommentDto;
use App\Domain\Entities\Comment;

interface CommentAssemblerInterface
{
    public function createDto(Comment $comment): CommentDto;
}
