<?php

namespace RosiersRobin\FilamentMiqeyLogin\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use RosiersRobin\FilamentMiqeyLogin\Events\SignSmsRequestReceived;

class WebhookController
{
    public function __invoke(Request $request): JsonResponse
    {
        $signature = $request->header('Signature');

        $calculatedSignature = hash_hmac('sha256', $request->getContent(), config('miqey-login.webhook_secret'));

        if (! hash_equals($signature, $calculatedSignature)) {
            return response()->json(status: 401);
        }

        $phone = $request->get('phone');
        $code = $request->get('code');

        $token = Str::random(32); // generate random token for the phone

        Cache::put($token, $phone, Carbon::now()->addSeconds(20));

        event(new SignSmsRequestReceived($code, $token));

        return response()->json(status: 204);
    }
}
