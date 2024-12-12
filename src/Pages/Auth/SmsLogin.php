<?php

namespace RosiersRobin\FilamentMiqeyLogin\Pages\Auth;

use Filament\Facades\Filament;
use Filament\Pages\Auth\Login as BaseAuth;
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

    private string $mobileLoginUrl = '';

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $signService = new SignAgentService;

        try {
            $sign = $signService->getSign();
            // render the things for the views
            $this->setSignDataForView($sign);

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

    public function getMobileLoginUrl(): string
    {
        return $this->mobileLoginUrl;
    }

    public function getBrowserAgent(): Agent
    {
        return new Agent;
    }

    /**
     * @throws \JsonException
     */
    private function setSignDataForView(array $data): void
    {
        // set the params
        $this->qrCodeData = data_get($data, 'data');
        $this->androidSmsUrl = data_get($data, 'data');
        $this->iosSmsLogin = data_get($data, 'data');
        $this->channelCode = data_get($data, 'code');
        $this->mobileLoginUrl = 'https://app.miqey.com/login/' . data_get($data, 'code');
    }
}
