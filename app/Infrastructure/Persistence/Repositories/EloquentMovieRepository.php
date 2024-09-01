<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Application\Services\MovieHydratorInterface;
use App\Application\Transformers\MovieToColumnsTransformerInterface;
use App\Domain\Entities\Movie;
use App\Domain\Enum\SortType;
use App\Domain\Repositories\MovieRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\UuidInterface;

class EloquentMovieRepository implements MovieRepositoryInterface
{
    private const TABLE = 'movies';

    public function __construct(
        private readonly MovieHydratorInterface $movieHydrator,
        private readonly MovieToColumnsTransformerInterface $columnsTransformer,
    ) {
    }

    public function save(Movie $movie): void
    {
        DB::table(self::TABLE)->updateOrInsert(
            $this->columnsTransformer->criteria($movie),
            $this->columnsTransformer->simpleFields($movie)
        );
    }

    public function findById(UuidInterface $id): ?Movie
    {
        $record = DB::table(self::TABLE)->find($id->toString());

        return $record ? $this->movieHydrator->fromDbColumns($record) : null;
    }

    /**
     * @return array<Movie>
     */
    public function findAll(SortType $type): array
    {
        $records = DB::table(self::TABLE)
            ->orderBy($type->value)
            ->get();

        return $records->map(
            fn ($record): Movie => $this->movieHydrator->fromDbColumns($record)
        )->all();
    }

    public function deleteById(UuidInterface $id): void
    {
        DB::table(self::TABLE)->delete($id->toString());
    }
}
