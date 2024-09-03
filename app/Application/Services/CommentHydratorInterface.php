<?php

namespace App\Application\Services;

use App\Domain\Entities\Comment;
use stdClass;

interface CommentHydratorInterface
{
    public function fromDbColumns(stdClass $record): Comment;
}
