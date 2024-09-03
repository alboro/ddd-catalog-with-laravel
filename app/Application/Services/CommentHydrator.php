<?php

namespace App\Application\Services;

use App\Domain\Entities\Comment;
use Ramsey\Uuid\Uuid;
use stdClass;
use ReflectionClass;
use ReflectionProperty;

final class CommentHydrator implements CommentHydratorInterface
{
    public function fromDbColumns(stdClass $record): Comment
    {
        $reflectionClass = new ReflectionClass(Comment::class);
        $comment = $reflectionClass->newInstanceWithoutConstructor();
        $properties = [
            'id' => Uuid::fromString($record->id),
            'movieId' => Uuid::fromString($record->movie_id),
            'content' => $record->content,
        ];

        foreach ($properties as $property => $value) {
            $reflectionProperty = new ReflectionProperty(Comment::class, $property);
            $reflectionProperty->setAccessible(true);
            $reflectionProperty->setValue($comment, $value);
        }

        return $comment;
    }
}
