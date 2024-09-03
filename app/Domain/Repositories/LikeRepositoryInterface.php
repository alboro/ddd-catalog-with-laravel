<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Like;
use Ramsey\Uuid\UuidInterface;

interface LikeRepositoryInterface
{
    public function save(Like $like): void;

    public function deleteByMovieId(UuidInterface $movieId): void;
}
