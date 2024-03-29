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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [   
        'client_id' => '655479216441648',
        'client_secret' => 'ccbd9d140141235f4bbeb5fdd3f59802',
        'redirect' => 'https://mapbirdy.com/fb/callback',
    ],

        'google' => [
        'client_id' => '961850424952-e84vof6m1q8l4vp9u8mh33v5d5t1o5fp.apps.googleusercontent.com',
        'client_secret' =>  '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',
        'redirect' => 'https://mapbirdy.com/gmail/callback',
    ],

];

/*
655479216441648
ccbd9d140141235f4bbeb5fdd3f59802

old details
    'facebook' => [   
        'client_id' => '955739205638611',
        'client_secret' => '7aefbd6813b3812ba3c7aa90aa963de3',
        'redirect' => 'https://mapbirdy.com/fb/callback',
    ],
*/
