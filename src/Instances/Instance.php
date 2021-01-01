<?php

namespace RenokiCo\LeagueSdk\Instances;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use RenokiCo\LeagueSdk\Concerns\HasAttributes;

class Instance implements Arrayable, Jsonable
{
    use HasAttributes;

    /**
     * The CDN version for the resource.
     * Not applicable to all resources.
     *
     * @var string
     */
    protected $version;

    /**
     * Initialize the class.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Set the version for the instance.
     * Not applicable to all resources.
     *
     * @param  string  $version
     * @return $this
     */
    public function setVersion(string $version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version for the instance.
     *
     * @return string|null
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
