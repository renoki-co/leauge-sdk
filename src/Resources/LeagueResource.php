<?php

namespace RenokiCo\LeagueSdk\Resources;

use RenokiCo\LeagueSdk\Endpoints\LeagueEndpoint;

class LeagueResource extends LeagueEndpoint
{
    /**
     * The game prefix for URL.
     *
     * @var string
     */
    protected static $game = 'lol';

    /**
     * The version prefix for the URL.
     *
     * @var string
     */
    protected static $version = 'v4';

    /**
     * The resource name prefix for the URL.
     *
     * @var string
     */
    protected static $resource = 'summoners';
}
