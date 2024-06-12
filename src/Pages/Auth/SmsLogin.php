<?php

namespace RosiersRobin\FilamentMiqeyLogin\Pages\Auth;

use Filament\Facades\Filament;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;
use Libaro\MiQey\Services\SignAgentService;

class SmsLogin extends BaseAuth
{
    protected static string $view = 'filament-miqey-login::pages.auth.login';

    private bool $useDefaultLogin = false;

    private string $qrCodeData = '';

    private string $androidSmsUrl = '';

    private string $iosSmsLogin = '';

    private string $channelCode = '';

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $signService = new SignAgentService();

        try {
            $signService->getSign();
            // render the things for the views
            $this->setSignDataForView();

        } catch (\Throwable $exception) {
            $this->useDefaultLogin = true;
        }
    }

    public function shouldUseDefaultLogin(): bool
    {
        return $this->useDefaultLogin;
    }

    public function getLoginQr(): string
    {
        return $this->qrCodeData;
    }

    public function getAndroidLoginUrl(): string
    {
        return $this->androidSmsUrl;
    }

    public function getIosLoginUrl(): string
    {
        return $this->iosSmsLogin;
    }

    public function getChannelCode(): string
    {
        return $this->channelCode;
    }

    public function getBrowserAgent(): Agent
    {
        return new Agent();
    }

    /**
     * @throws \JsonException
     */
    private function setSignDataForView(): void
    {
        $agent = new Agent();
        $method = $agent->isDesktop() ? 'qr' : 'sms';

        $response = Http::post('https://secureid.digitalhq.com/api/generate', [
            'api_key' => config('miqey.api_key'),
            'type' => $method,
        ]);

        $bodyString = $response->getBody()->getContents();

        if (! json_validate($bodyString)) {
            throw new \Exception('Not a valid json');
        }

        $decoded = json_decode($bodyString, true, 512, JSON_THROW_ON_ERROR);

        // set the params
        $this->qrCodeData = data_get($decoded, 'qr');
        $this->androidSmsUrl = data_get($decoded, 'android');
        $this->iosSmsLogin = data_get($decoded, 'ios');
        $this->channelCode = data_get($decoded, 'code');
    }
}
