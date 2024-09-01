<?php

namespace App\Application\Services;

use App\Domain\Entities\Movie;
use stdClass;

interface MovieHydratorInterface
{
    public function fromDbColumns(stdClass $record): Movie;
}
