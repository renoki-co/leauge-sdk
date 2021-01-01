<?php

namespace RenokiCo\LeagueSdk\Instances;

class ChampionPassive extends ChampionSpell
{
    /**
     * Get the image URL for the passive spell.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        $name = $this->getImage()['full'];

        return "http://ddragon.leagueoflegends.com/cdn/{$this->getVersion()}/img/passive/{$name}.png";
    }
}
