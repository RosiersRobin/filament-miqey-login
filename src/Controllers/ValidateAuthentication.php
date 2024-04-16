<?php

namespace RosiersRobin\FilamentMiqeyLogin\Controllers;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ValidateAuthentication
{
    public function __invoke(Request $request): RedirectResponse
    {
        $hasToken = Cache::has($request->get('token'));

        if (! $hasToken) {
            // todo: change to exception?
            abort(403, 'token mismatch');
        }

        $phoneNumber = Cache::pull($request->get('token'));

        // todo: make the user model dynamic using the plugin
        $user = \App\Models\User::query()
            ->where('phone_number', '=', $phoneNumber)
            ->first();

        if (is_null($user)) {
            // todo: change to exception?
            abort(403, 'user not found');
        }

        Filament::auth()->login($user, true);

        return redirect()->to(Filament::getCurrentPanel()?->getPath());
    }
}
