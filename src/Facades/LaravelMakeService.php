<?php

namespace Artogrig\LaravelMakeService\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelMakeService extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelmakeservice';
    }
}
