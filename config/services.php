<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],
    'facebook'=>[
        'client_id' => '7612866255496998',
        'client_secret' => '98724c7541c92638ab4a57952acb6e81',
        'redirect' => 'https://localhost/Weblaravel/admin/callback'
    ],
    'google'=>[
        'client_id' => '779886708073-8261aemmg66kk18v9ml9rodtriigpso0.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/Weblaravel/google/callback'
    ],
];
