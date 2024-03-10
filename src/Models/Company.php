<?php

namespace AdminKit\Companies\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Collection;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use AdminKit\Core\Abstracts\Models\AbstractModel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AdminKit\Companies\Database\Factories\CompanyFactory;

/**
 * @property-read string $title
 * @property-read string $text
 * @property-read string $background
 *
 * @property-read string $history_title
 * @property-read string $history_text
 *
 * @property-read string $mission_title
 * @property-read string $mission_text
 * @property-read Collection $mission_attachments
 * @property-read string $mission_background
 *
 * @property-read History[] $histories
 * @property-read Manager[] $managers
 */
class Company extends AbstractModel implements HasMedia
{
    use HasFactory;
    use HasTranslations;
    use InteractsWithMedia;

    protected $table = 'admin_kit_companies';

    protected $fillable = [
        'title',
        'text',
        'history_title',
        'history_text',
        'mission_title',
        'mission_text',
    ];

    protected array $translatable = [
        'title',
        'text',
        'history_title',
        'history_text',
        'mission_title',
        'mission_text',
    ];

    protected static function newFactory(): CompanyFactory
    {
        return new CompanyFactory();
    }

    public function background(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('background')
        );
    }

    public function missionAttachments(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getMedia('mission_attachments.'.app()->getLocale())
                ->map
                ->getFullUrl()
        );
    }

    public function missionBackground(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('mission_background.'.app()->getLocale())
        );
    }

    public function histories(): HasMany
    {
        return $this->hasMany(History::class)
            ->orderBy('sort');
    }

    public function managers(): HasMany
    {
        return $this->hasMany(Manager::class)
            ->orderBy('sort');
    }
}
