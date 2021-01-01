<?php

namespace RenokiCo\LeagueSdk\Instances;

class ChampionSkin extends Instance
{
    /**
     * Get the splash art URL for the skin.
     *
     * @return string
     */
    public function getSplashArtUrl(): string
    {
        return "http://ddragon.leagueoflegends.com/cdn/img/champion/splash/{$this->getId()}_{$this->getNum()}.jpg";
    }

    /**
     * Get the loading screen image URL for the skin.
     *
     * @return string
     */
    public function getLoadingScreenImageUrl(): string
    {
        return "http://ddragon.leagueoflegends.com/cdn/img/champion/loading/{$this->getId()}_{$this->getNum()}.jpg";
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'splash_art_url' => $this->getSplashArtUrl(),
            'loading_screen_image_url' => $this->getLoadingScreenImageUrl(),
        ]);
    }
}
