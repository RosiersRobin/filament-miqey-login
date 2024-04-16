<?php

return [
    'api_key' => env('MIQEY_API_KEY'),
    'webhook_secret' => env('MIQEY_WEBHOOK_SECRET'),

    'user_model' => env('USER_MODEL', '\App\Models\User'),
];
