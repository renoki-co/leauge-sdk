<?php

namespace RenokiCo\LeagueSdk\Resources\League;

use RenokiCo\LeagueSdk\Resources\LeagueResource;

class Summoner extends LeagueResource
{
    public static function getByName(string $name)
    {
        $response = static::callSilently('GET', "/summoners/by-name/{$name}");

        return $response ? new Self($response) : null;
    }
}
