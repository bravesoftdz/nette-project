<?php declare(strict_types=1);

namespace App\Services\PublicationService;

use App\Services\PublicationService\Events\PublicationListener;
use App\Services\PublicationService\Requests\PublicationRequestInterface;
use Kdyby\Events\EventArgsList;
use Kdyby\Events\EventManager;
use Kdyby\Monolog\Logger;

/**
 * Class PublicationService
 * @package Services
 */
final class PublicationService
{
    /** @var \Monolog\Logger */
    private $logger;

    /** @var  EventManager */
    private $eventManager;

    public function test()
    {
        $this->logger->addAlert('test!');
        var_dump('test'); die();
    }

    /**
     * PublicationService constructor.
     * @param Logger $logger
     * @param EventManager $em
     */
    public function __construct(Logger $logger, EventManager $em)
    {
        $this->logger = $logger;
        $this->eventManager = $em;
    }

    public function execute(PublicationRequestInterface $request)
    {
        $this->eventManager->addEventSubscriber(new PublicationListener());
        $this->eventManager->dispatchEvent(
            'App\Services\PublicationService\Events\PublicationProcess::newPublication',
            new EventArgsList([$request,$this->logger]));
    }
}