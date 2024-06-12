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

        $userClass = config('miqey.user_model');
        $user = $userClass::query()
            ->where(config('miqey.user_phone_column', 'phone_number'), '=', $phoneNumber)
            ->first();

        if (is_null($user)) {
            // todo: change to exception?
            abort(403, 'user not found');
        }

        Filament::auth()->login($user, true);

        return redirect()->to(Filament::getCurrentPanel()?->getPath() ?? $request->get('redirect_to', '/'));
    }
}
