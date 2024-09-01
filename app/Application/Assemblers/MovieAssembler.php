<?php

namespace App\Application\Assemblers;

use App\Application\Dto\MovieDto;
use App\Domain\Entities\Movie;

final class MovieAssembler implements MovieAssemblerInterface
{
    public function createDto(Movie $movie): MovieDto
    {
        return new MovieDto(
            id: $movie->id()->toString(),
            title: $movie->title(),
            description: $movie->description(),
            year: $movie->year(),
        );
    }
}
