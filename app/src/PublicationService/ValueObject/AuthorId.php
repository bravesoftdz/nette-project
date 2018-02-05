<?php

namespace App\Services\PublicationService\ValueObject;

/**
 * Class AuthorId
 * @package App\Services\PublicationService\ValueObject
 */
class AuthorId
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