<?php

namespace RenokiCo\LeagueSdk;

use Illuminate\Support\ServiceProvider;

class LeagueSdkServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/league-sdk.php' => config_path('league-sdk.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__.'/../config/league-sdk.php', 'league-sdk'
        );

        LeagueSdk::setCacheStore(config('league-sdk.cache.store'));
        LeagueSdk::setCacheDuration(config('league-sdk.cache.duration'));
        LeagueSdk::setToken(config('league-sdk.token'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
