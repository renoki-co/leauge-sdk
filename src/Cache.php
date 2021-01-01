<?php

namespace RenokiCo\LeagueSdk;

use Illuminate\Contracts\Cache\Store;

class Cache
{
    /**
     * Proxy the call to the LeagueSdk store.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $store = LeagueSdk::$cacheStore ?: Illuminate\Cache\ArrayStore::class;

        return (new $store)->{$method}(...$parameters);
    }

    /**
     * Proxy the static call to the LeagueSdk store.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        return (new static)->{$method}(...$parameters);
    }
}
