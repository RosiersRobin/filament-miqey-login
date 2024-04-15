<?php

use Illuminate\Support\Facades\Route;
use RosiersRobin\FilamentMiqeyLogin\Controllers\ValidateAuthentication;

Route::get('/miqey/sign-request/authenticate', ValidateAuthentication::class)->name('miqey.auth.sms');
