<?php

namespace RosiersRobin\FilamentMiqeyLogin\Pages\Auth;

use Filament\Pages\Auth\Login as BaseAuth;

class SmsLogin extends BaseAuth
{
    protected static string $view = 'filament-miqey-login::pages.auth.login';
}
