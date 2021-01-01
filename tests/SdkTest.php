<?php

namespace RenokiCo\LeagueSdk\Test;

use RenokiCo\LeagueSdk\Instances\Season;
use RenokiCo\LeagueSdk\Instances\Queue;
use RenokiCo\LeagueSdk\Instances\Map;
use RenokiCo\LeagueSdk\Instances\GameMode;
use RenokiCo\LeagueSdk\Instances\GameType;
use RenokiCo\LeagueSdk\StaticData;

class SdkTest extends TestCase
{
    protected static $classes = [
        Season::class => 'seasons',
        Queue::class => 'queues',
        Map::class => 'maps',
        GameMode::class => 'gameModes',
        GameType::class => 'gameTypes',
    ];

    public function test_static_data()
    {
        foreach (static::$classes as $class => $method) {
            foreach (StaticData::{$method}() as $instance) {
                $this->assertInstanceOf($class, $instance);
                $this->assertTrue(is_array($instance->toArray()));
            }
        }
    }
}
