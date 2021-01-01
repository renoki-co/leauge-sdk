<?php

namespace RenokiCo\LeagueSdk\Instances;

class Item extends Instance
{
    /**
     * Get the image URL for the item.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return "http://ddragon.leagueoflegends.com/cdn/{$this->getVersion()}/img/item/{$this->getId()}.png";
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
