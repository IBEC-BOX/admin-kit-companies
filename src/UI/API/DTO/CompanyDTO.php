<?php

namespace AdminKit\Companies\UI\API\DTO;

use Spatie\LaravelData\Data;
use Illuminate\Support\Collection;
use AdminKit\Companies\Models\Company;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;

class CompanyDTO extends Data
{
    public function __construct(
        public string         $title,
        public string         $text,
        public ?string         $background,

        public ?string         $history_title,
        public ?string         $history_text,
        #[DataCollectionOf(HistoryDTO::class)]
        public DataCollection $history_years,

        public ?string         $mission_title,
        public ?string         $mission_text,
        public ?Collection     $mission_attachments,
        public ?string         $mission_background,

        #[DataCollectionOf(ManagerDTO::class)]
        public DataCollection $management,
    )
    {
    }

    public static function fromModel(Company $company): CompanyDTO
    {
        return new self(
            title: $company->title,
            text: $company->text,
            background: $company->background,

            history_title: $company->history_title,
            history_text: $company->history_text,
            history_years: HistoryDTO::collection($company->histories),

            mission_title: $company->mission_title,
            mission_text: $company->mission_text,
            mission_attachments: $company->mission_attachments,
            mission_background: $company->mission_background,

            management: ManagerDTO::collection($company->managers),
        );
    }
}
