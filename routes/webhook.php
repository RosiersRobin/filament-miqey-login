<?php

use Illuminate\Support\Facades\Route;
use RosiersRobin\FilamentMiqeyLogin\Controllers\WebhookController;

Route::post('/miqey/sign-request/webhook', WebhookController::class)->name('miqey.webhook');
