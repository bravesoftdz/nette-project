<?php

namespace App\Services\PublicationService\Requests;

/**
 * Class ArticleRequest
 * @package App\Services\PublicationService\Requests
 */
class ArticleRequest extends PublicationRequest implements PublicationRequestInterface
{
    public const TYPE = 'Article';
}