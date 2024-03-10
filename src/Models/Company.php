<?php

namespace AdminKit\Companies\Models;

use AdminKit\Companies\Database\Factories\CompanyFactory;
use AdminKit\Core\Abstracts\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Company extends AbstractModel
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'admin_kit_companies';

    protected $fillable = [
        'title',
    ];

    protected $casts = [
        //
    ];

    protected $translatable = [
        'title',
    ];

    protected static function newFactory(): CompanyFactory
    {
        return new CompanyFactory();
    }
}
