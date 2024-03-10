<?php

namespace AdminKit\Companies\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * @property-read int $company_id
 * @property-read ?string $title
 * @property-read ?string $text
 * @property-read ?string $sort
 */
class History extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'admin_kit_company_histories';

    protected $fillable = [
        'company_id',
        'title',
        'text',
        'sort',
    ];

    protected array $translatable = [
        'title',
        'text',
    ];
}
