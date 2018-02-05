<?php declare(strict_types = 1);

namespace App\Services\PublicationService\DI;

use Nette\DI\Compiler;
use Nette\DI\CompilerExtension;

/**
 * Class PublicationServiceExtension
 * @package Services\DI
 */
final class PublicationServiceExtension extends CompilerExtension
{
    public function loadConfiguration()
    {
        // this method loads servcies from config and registers them do Nette\DI Container
        Compiler::loadDefinitions(
            $this->getContainerBuilder(),
            $this->loadFromFile(__DIR__ . '/../../../config/services.neon')
        );
    }
}