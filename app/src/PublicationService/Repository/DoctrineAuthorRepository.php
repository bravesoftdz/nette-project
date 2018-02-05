<?php

namespace App\Services\PublicationService\Repository;

use App\ModelInterface;
use App\Services\PublicationService\ValueObject\AuthorId;
use Ramsey\Uuid\Uuid;

/**
 * Class DoctrineAuthorRepository
 * @package App\Services\PublicationService\Repository
 */
class DoctrineAuthorRepository extends EntityRepository implements ArticleRepositoryInterface
{

    public function nextIdentity()
    {
        return AuthorId::create(strtoupper(Uuid::uuid4()));
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