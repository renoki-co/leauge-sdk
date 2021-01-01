<?php

namespace RenokiCo\LeagueSdk;

class StaticData extends LeagueSdk
{
    /**
     * Get the list of available seasons.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function seasons()
    {
        return collect(static::readFromJson(
            'http://static.developer.riotgames.com/docs/lol/seasons.json'
        ))->mapInto(Instances\Season::class);
    }

    /**
     * Get the list of available queues.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function queues()
    {
        return collect(static::readFromJson(
            'http://static.developer.riotgames.com/docs/lol/queues.json'
        ))->mapInto(Instances\Queue::class);
    }

    /**
     * Get the list of available maps.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function maps()
    {
        return collect(static::readFromJson(
            'http://static.developer.riotgames.com/docs/lol/maps.json'
        ))->mapInto(Instances\Map::class);
    }

    /**
     * Get the list of available game modes.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function gameModes()
    {
        return collect(static::readFromJson(
            'http://static.developer.riotgames.com/docs/lol/gameModes.json'
        ))->mapInto(Instances\GameMode::class);
    }

    /**
     * Get the list of available game types.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function gameTypes()
    {
        return collect(static::readFromJson(
            'http://static.developer.riotgames.com/docs/lol/gameTypes.json'
        ))->mapInto(Instances\GameType::class);
    }
}
