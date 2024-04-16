<?php

use Illuminate\Support\Facades\Route;
use RosiersRobin\FilamentMiqeyLogin\Controllers\ValidateAuthentication;

Route::get('/miqey/sign-request/authenticate', ValidateAuthentication::class)->middleware('web')->name('miqey.auth.sms');
