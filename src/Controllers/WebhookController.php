<?php

namespace RosiersRobin\FilamentMiqeyLogin\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use RosiersRobin\events\SignSmsRequestReceived;

class WebhookController
{

    public function __invoke(Request $request)
    {
        $phone = $request->get('phone');
        $code = $request->get('code');

        $token = Str::random(32); // generate random token for the phone

        Cache::put($token, $phone, Carbon::now()->addSeconds(20));

        event(new SignSmsRequestReceived($code, $token));

        return response()->json(status: 204);
    }
}
