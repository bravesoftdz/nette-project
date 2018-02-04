<?php

namespace App\Services\PublicationService\ValueObject;

/**
 * Class ArticleId
 * @package App\Services\PublicationService\ValueObject
 */
class ArticleId
{
    private $id;

    private function __construct($anId)
    {
        $this->id = $anId;
    }
    public static function create($anId)
    {
        return new static($anId);
    }
}