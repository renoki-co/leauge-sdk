<?php

namespace RenokiCo\LeagueSdk\Instances;

class Map extends Instance
{
    /**
     * Get the image URL for the minimap.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return "http://ddragon.leagueoflegends.com/cdn/{$this->getVersion()}/img/map/map{$this->getMapId()}.png";
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
