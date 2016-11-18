<?php

namespace Skychf\Reap\Facades;

use Illuminate\Support\Facades\Facade;

class Reap extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'reap';
    }
}