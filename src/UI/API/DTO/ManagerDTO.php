<?php

namespace AdminKit\Companies\UI\API\DTO;

use AdminKit\Companies\Models\Manager;
use Spatie\LaravelData\Data;

class ManagerDTO extends Data
{
    public function __construct(
        public string $name,
        public string $bio,
        public string $text,
        public string $photo,
    ) {
    }

    public static function fromModel(Manager $manager): ManagerDTO
    {
        return new self(
            name: $manager->name,
            bio: $manager->bio,
            text: $manager->text,
            photo: $manager->photo,
        );
    }
}
