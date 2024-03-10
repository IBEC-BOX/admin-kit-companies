<?php

namespace AdminKit\Companies\UI\API\DTO;

use AdminKit\Companies\Models\History;
use Spatie\LaravelData\Data;

class HistoryDTO extends Data
{
    public function __construct(
        public string $title,
        public string $text,
    ) {
    }

    public static function fromModel(History $history): HistoryDTO
    {
        return new self(
            title: $history->title,
            text: $history->text,
        );
    }
}
