<?php

namespace App\Services\PublicationService\Events;

use Nette\Object;

/**
 * Class PublicationProcess
 * @package App\Events
 */
class PublicationProcess extends Object
{
    /**
     * This event will always dispatch the global listeners first.
     * @globalDispatchFirst
     */
    public $onStartup = array();

    /**
     * This event will always dispatch the callbacks first even if you changed the default behaviour in config.neon.
     * @globalDispatchFirst false
     */
    public $onSuccess = array();
}