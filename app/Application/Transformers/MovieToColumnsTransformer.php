<?php

namespace App\Application\Transformers;

use App\Domain\Entities\Movie;

final class MovieToColumnsTransformer implements MovieToColumnsTransformerInterface
{
    public function transform(Movie $movie): array
    {
        return [
            'title' => $movie->title(),
            'description' => $movie->description(),
            'year' => $movie->year(),
        ];
    }
}
