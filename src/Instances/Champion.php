<?php

namespace RenokiCo\LeagueSdk\Instances;

class Champion extends Instance
{
    /**
     * Get the collection of skins as ChampionSkin instance.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSkins()
    {
        return collect($this->getAttribute('skins'))->map(function ($skin) {
            return (new ChampionSkin($skin))->setVersion($this->getVersion());
        })->values();
    }

    /**
     * Get the collection of spells as ChampionSpell instance.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSpells()
    {
        return collect($this->getAttribute('spells'))->map(function ($spell) {
            return (new ChampionSpell($spell))->setVersion($this->getVersion());
        })->values();
    }

    /**
     * Get the Passive instance.
     *
     * @return \RenokiCo\LeagueSdk\Instances\ChampionPassive
     */
    public function getPassive()
    {
        return (new ChampionPassive($this->getAttribute('passive')))->setVersion($this->getVersion());
    }

    /**
     * Get the square image URL for the champion.
     *
     * @return string
     */
    public function getSquareImageUrl(): string
    {
        return "http://ddragon.leagueoflegends.com/cdn/{$this->getVersion()}/img/champion/{$this->getId()}.png";
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'square_image_url' => $this->getSquareImageUrl(),
        ]);
    }
}
