<?php

namespace RosiersRobin\FilamentMiqeyLogin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RosiersRobin\FilamentMiqeyLogin\FilamentMiqeyLogin
 */
class FilamentMiqeyLogin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \RosiersRobin\FilamentMiqeyLogin\FilamentMiqeyLogin::class;
    }
}
