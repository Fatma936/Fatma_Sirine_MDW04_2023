<?php

use BeyondCode\LaravelWebSockets\Dashboard\Http\Middleware\Authorize;

return [
    'apps' => [
        [
            'name' => 'app-name', // Change this to your application name
            'host' => '0.0.0.0',
            'port' => 6001,
            'path' => '/websocket',
            'secured' => false,
            'internal' => false,
            'maxConnections' => null,
            'allowedOrigins' => [
                'localhost',
                '127.0.0.1'
            ],
            'maxRequestSize' => 64 * 1024,
            'pathGenerator' => BeyondCode\LaravelWebSockets\Server\DefaultPathGenerator::class,
        ],
    ],

    'dashboard' => [
        'port' => 6001,
    ],

    'ssl' => [
        'local_cert' => null,
        'local_pk' => null,
        'passphrase' => null,
    ],

    'channels' => [
        'presence' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true,
            ],
        ],
    ],

    'route' => [
        'prefix' => 'laravel-websockets',
        'middleware' => ['web'],
        'namespace' => 'BeyondCode\LaravelWebSockets\Http\Controllers',
        'api_endpoint' => '/api',
        'health_check_interval' => 60,
        'health_check_timeout' => 10,
    ],

    'statistics' => [
        'model' => BeyondCode\LaravelWebSockets\Statistics\Models\WebSocketsStatisticsEntry::class,
        'interval_in_seconds' => 60,
        'delete_statistics_older_than_days' => 60,
        'perform_dns_lookup' => false,
    ],
];
