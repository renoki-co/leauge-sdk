<?php

namespace RenokiCo\LeagueSdk\Endpoints;

use RenokiCo\LeagueSdk\Exceptions\LeagueSdkApiException;
use RenokiCo\LeagueSdk\Instances\Instance;

class Endpoint extends Instance
{
    public static function client(string $region = null)
    {
        return LeagueSdk::client(
            $region,
            static::$game,
            static::$resource,
            static::$version
        );
    }

    public static function call(string $method, string $endpoint, string $payload = '', string $region = null)
    {
        try {
            $response = static::client()->request($method, $endpoint, [
                RequestOptions::BODY => $payload,
            ]);
        } catch (ClientException $e) {
            $payload = json_decode((string) $e->getResponse()->getBody(), true);

            throw new LeagueSdkApiException(
                $payload['status']['message'],
                $payload['status']['status_code']
            );
        }

        $json = @json_decode($response->getBody(), true);

        return $json ?: (string) $response->getBody();
    }

    public static function callSilently(string $method, string $endpoint, string $payload = '', string $region = null)
    {
        $response = static::call($method, $endpoint, $payload, $region);

        return $response instanceof LeagueSdkApiException
            ? null
            : $response;
    }
}
