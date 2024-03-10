<?php

namespace AdminKit\Companies\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property-read int $company_id
 * @property-read string $name
 * @property-read ?string $text
 * @property-read ?string $bio
 * @property-read ?string $photo
 * @property-read ?string $sort
 */
class Manager extends Model implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $table = 'admin_kit_company_managers';

    protected $fillable = [
        'company_id',
        'name',
        'text',
        'bio',
        'sort',
    ];

    protected array $translatable = [
        'name',
        'text',
        'bio',
    ];

    public function photo(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl()
        );
    }
}
