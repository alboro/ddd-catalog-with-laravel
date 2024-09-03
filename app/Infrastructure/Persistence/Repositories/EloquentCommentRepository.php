<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Application\Services\CommentHydratorInterface;
use App\Application\Transformers\CommentToColumnsTransformerInterface;
use App\Domain\Entities\Comment;
use App\Domain\Repositories\CommentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\UuidInterface;

final class EloquentCommentRepository implements CommentRepositoryInterface
{
    private const TABLE = 'comments';

    public function __construct(
        private CommentHydratorInterface $commentHydrator,
        private CommentToColumnsTransformerInterface $columnsTransformer,
    ) {
    }

    public function save(Comment $comment): void
    {
        DB::table(self::TABLE)->updateOrInsert(
            ['id' => $comment->id()->toString()],
            $this->columnsTransformer->transform($comment)
        );
    }

    public function findById(UuidInterface $id): ?Comment
    {
        $record = DB::table(self::TABLE)->find($id->toString());
        return $record ? $this->commentHydrator->fromDbColumns($record) : null;
    }

    public function findByMovieId(UuidInterface $movieId): array
    {
        $records = DB::table(self::TABLE)
            ->where('movie_id', $movieId->toString())
            ->get();

        return $records->map(fn($record): Comment => $this->commentHydrator->fromDbColumns($record))->all();
    }

    public function deleteById(UuidInterface $id): void
    {
        DB::table(self::TABLE)->delete($id->toString());
    }

    public function deleteByMovieId(UuidInterface $movieId): void
    {
        DB::table(self::TABLE)
            ->where('movie_id', $movieId->toString())
            ->delete();
    }
}
