<?php


return [

    /*
     * The property ID of which you want to display data.
     */
    'property_id' => env('ANALYTICS_PROPERTY_ID'),

    /*
     * Path to the service account credentials JSON file.
     */
    'service_account_credentials_json' => storage_path(env('ANALYTICS_SERVICE_ACCOUNT_CREDENTIALS_PATH')),

    /*
     * The amount of minutes the Google API responses will be cached.
     * If set to zero, responses won't be cached.
     */
    'cache_lifetime_in_minutes' => 60 * 24,

    /*
     * Cache configuration.
     */
    'cache' => [
        'store' => 'file',
    ],
];
