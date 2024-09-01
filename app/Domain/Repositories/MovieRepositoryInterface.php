<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\Movie;
use App\Domain\Enum\SortType;
use Ramsey\Uuid\UuidInterface;

interface MovieRepositoryInterface
{
    public function save(Movie $movie): void;
    public function findById(UuidInterface $id): ?Movie;
    public function findAll(SortType $type): array;
    public function deleteById(UuidInterface $id): void;
}
