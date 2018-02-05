<?php

namespace App\Services\PublicationService\Repository;

use App\ModelInterface;

/**
 * Interface ArticleRepositoryInterface
 * @package App\Services\PublicationService\Repository
 */
interface ArticleRepositoryInterface
{
    public function nextIdentity();

    public function add(ModelInterface $anOrder);

    public function remove(ModelInterface $anOrder);
}