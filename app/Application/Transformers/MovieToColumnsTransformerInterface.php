<?php

namespace App\Application\Transformers;

use App\Domain\Entities\Movie;

interface MovieToColumnsTransformerInterface
{
    public function transform(Movie $movie): array;
}
