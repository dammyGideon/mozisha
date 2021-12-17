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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' =>[
        'client_id' => '406032376379-2q8vpcasj5jhp1uvt7sjp0mj8vp6j0g7.apps.googleusercontent.com',
        'client_secret' => 'TvXmL75OBVM2Zf0P130YSoh2',
        'redirect' => 'https://mozisha.com/auth/google/callback',
    ],

    'stripe' => [
        'secret' => 'sk_test_51HuczoI3O5RZUfSqIsxgda6KceT0cdH7CX3J9iYJ2uUY9VhnPMA9AWZ50UeehNUIpdD9j3RKiDuIq0IgAYusVVCI00mnReZjEx',
    ],

];
