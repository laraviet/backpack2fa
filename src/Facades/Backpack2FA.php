<?php

namespace Laraviet\Backpack2FA\Facades;

use Illuminate\Support\Facades\Facade;

class Backpack2FA extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'backpack2fa';
    }
}
