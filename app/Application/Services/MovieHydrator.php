<?php

namespace App\Application\Services;

use App\Domain\Entities\Movie;
use Ramsey\Uuid\Uuid;
use stdClass;
use ReflectionClass;
use ReflectionProperty;

final class MovieHydrator implements MovieHydratorInterface
{
    public function fromDbColumns(stdClass $record): Movie
    {
        $reflectionClass = new ReflectionClass(Movie::class);
        $movie = $reflectionClass->newInstanceWithoutConstructor();
        $properties = [
            'id' => Uuid::fromString($record->id),
            'title' => $record->title,
            'description' => $record->description,
            'year' => $record->year
        ];

        foreach ($properties as $property => $value) {
            $reflectionProperty = new ReflectionProperty(Movie::class, $property);
            $reflectionProperty->setAccessible(true);
            $reflectionProperty->setValue($movie, $value);
        }
        return $movie;
    }
}
