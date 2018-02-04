<?php

namespace App\Services\PublicationService\Requests;

/**
 * Interface PublicationRequestInterface
 * @package App\Services\PublicationService\Requests
 */
interface PublicationRequestInterface
{
    public function title();

    public function authors();

    public function pages();

    public function amount();

    public function type();
}