<?php

namespace App\Services\PublicationService\Repository;

use App\ModelInterface;
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

    public function add(ModelInterface $article)
    {
        $this->getEntityManager()->persist($article);
    }

    public function remove(ModelInterface $article)
    {
        $this->getEntityManager()->remove($article);
    }

    public function save()
    {
        $this->getEntityManager()->flush();
    }

}