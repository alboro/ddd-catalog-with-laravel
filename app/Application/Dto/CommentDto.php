<?php

namespace App\Application\Dto;

final readonly class CommentDto
{
    public function __construct(
        public string $id,
        public string $movieId,
        public string $content,
    ) {
    }
}
