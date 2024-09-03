<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Entities\Like;
use App\Domain\Repositories\LikeRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\UuidInterface;

final class EloquentLikeRepository implements LikeRepositoryInterface
{
    private const TABLE = 'likes';

    public function save(Like $like): void
    {
        DB::table(self::TABLE)->updateOrInsert(
            ['id' => $like->id()->toString()],
            ['movie_id' => $like->movieId()->toString()]
        );
    }

    public function deleteByMovieId(UuidInterface $movieId): void
    {
        DB::table(self::TABLE)
            ->where('movie_id', $movieId->toString())
            ->delete();
    }
}
