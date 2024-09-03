<?php

namespace App\Application\Assemblers;

use App\Application\Dto\MovieDto;
use App\Domain\Entities\Movie;

interface MovieAssemblerInterface
{
    public function createDto(Movie $movie, ?int $likeCount): MovieDto;
}
