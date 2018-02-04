<?php

namespace App\Services\PublicationService\Repository;

use App\Article;

/**
 * Interface ArticleRepositoryInterface
 * @package App\Services\PublicationService\Repository
 */
interface ArticleRepositoryInterface
{
    public function nextIdentity();

    public function add(Article $anOrder);

    public function remove(Article $anOrder);
}