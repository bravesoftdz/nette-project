<?php

namespace App\Services\PublicationService\Repository;

use App\Article;
use App\Services\PublicationService\ValueObject\ArticleId;
use Ramsey\Uuid\Uuid;

/**
 * Class DoctrineArticleRepository
 * @package App\Services\PublicationService\Repository
 */
class DoctrineArticleRepository extends EntityRepository implements ArticleRepositoryInterface
{

    public function nextIdentity()
    {
        return ArticleId::create(strtoupper(Uuid::uuid4()));
    }

    public function add(Article $article)
    {
        $this->getEntityManager()->persist($article);
    }

    public function remove(Article $article)
    {
        $this->getEntityManager()->remove($article);
    }
}