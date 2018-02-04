<?php

namespace App\Services\PublicationService\Requests;

/**
 * Class BookRequest
 * @package App\Services\PublicationService\Requests
 */
class BookRequest extends PublicationRequest implements PublicationRequestInterface
{
    public const TYPE = 'Book';
}