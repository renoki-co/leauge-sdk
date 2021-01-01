<?php

namespace RenokiCo\LeagueSdk\Instances;

class ProfileIcon extends Instance
{
    /**
     * Get the image URL for the profile icon.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return "http://ddragon.leagueoflegends.com/cdn/{$this->getVersion()}/img/profileicon/{$this->getId()}.png";
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
