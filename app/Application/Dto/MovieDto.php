<?php

namespace App\Application\Dto;

final readonly class MovieDto
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public int $year,
        public ?int $likeCount,
    ) {
    }
}
