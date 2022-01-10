<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allow_origins' => [
        'https://portal.zettatel.com',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    // 'exposed_headers' => [],

    'exposed_headers' => ['*'],

    'max_age' => 0,

    'supports_credentials' => false,

    'allowed_origins' => ['your-frontend.domain'],
    'paths' => [ '/path-you-are-requesting' ],
    'allowed_methods' => [ 'GET' ],
    'allowed_headers' => [ 'content-type,x-inertia,x-inertia-version,x-requested-with' ],
    'exposed_headers' => ['x-inertia']

];
