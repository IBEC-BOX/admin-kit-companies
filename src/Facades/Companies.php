<?php

namespace AdminKit\Companies\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AdminKit\Companies\Companies
 */
class Companies extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AdminKit\Companies\Companies::class;
    }
}
