<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk integrasi payment gateway Midtrans (QRIS).
    | Ganti PLACEHOLDER dengan credentials asli dari dashboard Midtrans.
    |
    */

    'server_key' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-PLACEHOLDER'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-PLACEHOLDER'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    'snap_url' => env('MIDTRANS_IS_PRODUCTION', false)
        ? 'https://app.midtrans.com/snap/snap.js'
        : 'https://app.sandbox.midtrans.com/snap/snap.js',

    'api_url' => env('MIDTRANS_IS_PRODUCTION', false)
        ? 'https://api.midtrans.com'
        : 'https://api.sandbox.midtrans.com',

];
