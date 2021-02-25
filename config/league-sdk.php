<?php

return [

    'cache' => [

        'store' => \Illuminate\Cache\ArrayStore::class,

        'duration' => 3600,

    ],

    'token' => env('LEAGUE_SDK_TOKEN'),

];
