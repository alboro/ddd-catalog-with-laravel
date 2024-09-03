<?php

namespace App\Infrastructure\Persistence\Dao;

use App\Application\Dao\LikeDaoInterface;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\UuidInterface;

final readonly class LikeDao implements LikeDaoInterface
{
    private const TABLE = 'likes';

    public function countLikesByMovieId(UuidInterface $movieId): int
    {
        return DB::table(self::TABLE)
            ->where('movie_id', $movieId->toString())
            ->count();
    }
}
