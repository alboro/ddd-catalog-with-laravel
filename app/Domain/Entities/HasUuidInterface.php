<?php

namespace App\Domain\Entities;

use Ramsey\Uuid\UuidInterface;

interface HasUuidInterface
{
    public function id(): UuidInterface;
}
