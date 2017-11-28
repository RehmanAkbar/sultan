<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '344973165921287',
        'client_secret' => 'a260af9b3b435decbdee62d6640d41e5',
        'redirect' => 'http://perfumeclub.pk/callback_facebook',
    ],

    'google' => [
        'client_id' => '378818568001-e5mr2s793aohlr125gmtngqg64157lfq.apps.googleusercontent.com',
        'client_secret' => '8yQ9_mxTKQhSGzrkxRPJ_jCf',
        'redirect' => 'http://perfumeclub.pk/callback_google',
    ],

];
