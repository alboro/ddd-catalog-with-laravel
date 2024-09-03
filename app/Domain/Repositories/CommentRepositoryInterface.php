<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Comment;
use Ramsey\Uuid\UuidInterface;

interface CommentRepositoryInterface
{
    public function save(Comment $comment): void;

    public function findById(UuidInterface $id): ?Comment;

    public function findByMovieId(UuidInterface $movieId): array;

    public function deleteById(UuidInterface $id): void;
    public function deleteByMovieId(UuidInterface $movieId): void;
}
