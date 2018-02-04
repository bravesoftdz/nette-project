<?php

namespace App\Services\PublicationService\Repository;

use App\Author;

/**
 * Interface ArticleRepositoryInterface
 * @package App\Services\PublicationService\Repository
 */
interface AuthorRepositoryInterface
{
    public function nextIdentity();

    public function add(Author $anOrder);

    public function remove(Author $anOrder);
}