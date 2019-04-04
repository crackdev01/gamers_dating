<?php

return [
    /*
     * This is the API Token you got from https://api.igdb.com
     */
    'api_token' => env('IGDB_TOKEN', '1124c0adf55d6ee6bf48360b7d43569e'),

    /*
     * This package caches queries automatically.
     * Here you can set how long each query should be cached.
     *
     * To turn cache off set this value to 0
     */
    'cache_lifetime' => env('IGDB_CACHE_LIFETIME', 60),

    /*
     * This is the per-page limit for your tier ("Free" by default)
     * Adjust this to 500 if you are on the "Pro" tier or in the Partner Program
     * or to 5000 if you are in the "Enterprise" tier.
     */
    'per_page_limit' => 50,

    /*
     * This is the offset limit for your tier ("Free" by default)
     * Adjust this to 5000 if you are on the "Pro" tier or in the Partner Program
     * or to 0 (to turn it off) if you are in the "Enterprise" tier.
     */
    'offset_limit' => 150,
];
