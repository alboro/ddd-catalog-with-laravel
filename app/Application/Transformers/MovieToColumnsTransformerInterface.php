<?php

namespace App\Application\Transformers;

use App\Domain\Entities\Movie;

interface MovieToColumnsTransformerInterface
{
    public function criteria(Movie $movie): array;

    public function simpleFields(Movie $movie): array;
}
