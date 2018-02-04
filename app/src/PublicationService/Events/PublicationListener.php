<?php

namespace App\Services\PublicationService\Events;

use App\Services\PublicationService\Requests\PublicationRequestInterface;
use Kdyby\Monolog\Logger;
use Nette;
use Kdyby\Events\Subscriber;

/**
 * Class PublicationListener
 * @package App\Events
 */
class PublicationListener extends Nette\Object implements Subscriber
{
    public function getSubscribedEvents()
    {
        return array('App\Services\PublicationService\Events\PublicationProcess::newPublication');
    }

    public function newPublication(PublicationRequestInterface $request, Logger $logger)
    {
        $logger->addInfo(sprintf('New %s was saved by author %s',
            $request->type(),
            $request->authors()
        ));
//        var_dump($request); die();
    }
}