<?php

namespace App\Application\Dao;

use Ramsey\Uuid\UuidInterface;

interface LikeDaoInterface
{
    public function countLikesByMovieId(UuidInterface $movieId): int;
}
