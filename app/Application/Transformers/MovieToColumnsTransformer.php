<?php

namespace App\Application\Transformers;

use App\Domain\Entities\Movie;

final class MovieToColumnsTransformer implements MovieToColumnsTransformerInterface
{
    public function simpleFields(Movie $movie): array
    {
        return [
            'title' => $movie->title(),
            'description' => $movie->description(),
            'year' => $movie->year(),
        ];
    }

    public function criteria(Movie $movie): array
    {
        return [
            'id' => $movie->id()->toString(),
        ];
    }
}
