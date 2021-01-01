<?php

namespace RenokiCo\LeagueSdk;

class Dragon extends LeagueSdk
{
    const BR = 'br';
    const EUN = 'eun';
    const EUW = 'euw';
    const JP = 'jp';
    const KR = 'kr';
    const LA = 'la';
    const NA = 'na';
    const OC = 'oc';
    const TR = 'tr';
    const RU = 'ru';

    /**
     * Get the entire list of versions.
     *
     * @return array
     */
    public static function versions(): array
    {
        return static::readFromJson('https://ddragon.leagueoflegends.com/api/versions.json');
    }

    /**
     * Get the latest versions for APIs from a specifi region.
     *
     * @param  string|null  $region
     * @return array
     */
    public static function regionVersions(string $region = null): array
    {
        $region = $region ?: static::NA;

        return static::readFromJson("https://ddragon.leagueoflegends.com/realms/{$region}.json");
    }

    /**
     * Get the list of available languages.
     *
     * @return array
     */
    public static function languages(): array
    {
        return static::readFromJson('https://ddragon.leagueoflegends.com/cdn/languages.json');
    }

    /**
     * Get a collection of Champion instances.
     *
     * @param  string|null  $region
     * @param  string  $language
     * @return \Illuminate\Support\Collection
     */
    public static function champions(string $region = null, string $language = 'en_US')
    {
        $version = static::regionVersions($region)['n']['champion'];

        $champions = static::readFromJson(
            "http://ddragon.leagueoflegends.com/cdn/{$version}/data/{$language}/champion.json"
        )['data'] ?? [];

        return collect($champions)->map(function ($champion) use ($version) {
            return (new Instances\Champion($champion))->setVersion($version);
        })->values();
    }

    /**
     * Get a single instance of Champion by ID.
     *
     * @param  string  $key
     * @param  string|null  $region
     * @param  string  $language
     * @return \RenokiCo\LeagueSdk\Instances\Champion
     */
    public static function champion(string $key, string $region = null, string $language = 'en_US')
    {
        $version = static::regionVersions($region)['n']['champion'];

        $champion = static::readFromJson(
            "http://ddragon.leagueoflegends.com/cdn/{$version}/data/{$language}/champion/{$key}.json"
        )['data'][$key] ?? [];

        return (new Instances\Champion($champion))->setVersion($version);
    }

    /**
     * Get the list of available items as collection.
     *
     * @param  string|null  $region
     * @param  string  $language
     * @return \Illuminate\Support\Collection
     */
    public static function items(string $region = null, string $language = 'en_US')
    {
        $version = static::regionVersions($region)['n']['item'];

        $items = static::readFromJson(
            "http://ddragon.leagueoflegends.com/cdn/{$version}/data/{$language}/item.json"
        )['data'] ?? [];

        return collect($items)->map(function ($item, $id) use ($version) {
            return (new Instances\Item(array_merge($item, [
                'id' => $id,
            ])))->setVersion($version);
        })->values();
    }

    /**
     * Get the collection of available profile icons.
     *
     * @param  string|null  $region
     * @param  string  $language
     * @return \Illuminate\Support\Collection
     */
    public static function profileIcons(string $region = null, string $language = 'en_US')
    {
        $version = static::regionVersions($region)['n']['profileicon'];

        $icons = static::readFromJson(
            "http://ddragon.leagueoflegends.com/cdn/{$version}/data/{$language}/profileicon.json"
        )['data'] ?? [];

        return collect($icons)->map(function ($icon) use ($version) {
            return (new Instances\ProfileIcon($icon))->setVersion($version);
        })->values();
    }

    /**
     * Get the collection of available summoner spells.
     *
     * @param  string|null  $region
     * @param  string  $language
     * @return \Illuminate\Support\Collection
     */
    public static function summonerSpells(string $region = null, string $language = 'en_US')
    {
        $version = static::regionVersions($region)['n']['summoner'];

        $summonerSpells = static::readFromJson(
            "http://ddragon.leagueoflegends.com/cdn/{$version}/data/{$language}/summoner.json"
        )['data'] ?? [];

        return collect($summonerSpells)->map(function ($spell) use ($version) {
            return (new Instances\SummonerSpell($spell))->setVersion($version);
        })->values();
    }
}
