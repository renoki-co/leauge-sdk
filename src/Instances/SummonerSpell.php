<?php

namespace RenokiCo\LeagueSdk\Instances;

class SummonerSpell extends Instance
{
    /**
     * Get the image URL for the summoner spell.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return "http://ddragon.leagueoflegends.com/cdn/{$this->getVersion()}/img/spell/{$this->getId()}.png";
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'image_url' => $this->getImageUrl(),
        ]);
    }
}
