<?php

namespace RosiersRobin\FilamentMiqeyLogin\Pages\Auth;

use Filament\Facades\Filament;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;
use Libaro\SecureId\Services\SignAgentService;

class SmsLogin extends BaseAuth
{
    protected static string $view = 'filament-miqey-login::pages.auth.login';

    private bool $useDefaultLogin = false;

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        // render QR code :D
        $signService = new SignAgentService();
        try {
            $signService->getSign();
        } catch (\Throwable $exception) {
            $this->useDefaultLogin = true;
        }
    }

    public function shouldUseDefaultLogin(): bool
    {
        return $this->useDefaultLogin;
    }

    public function getSecureIdLoginMethod()
    {
        $agent = new Agent();
        $method = $agent->isDesktop() ? 'qr' : 'sms';

        $response = Http::post('https://secureid.digitalhq.com/api/generate', [
            'api_key' => config('secure-id.api_key'),
            'type' => $method
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getBrowserAgent(): Agent
    {
        return (new Agent());
    }
}
