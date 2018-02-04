<?php

namespace App\Services\PublicationService\Repository;

use App\Author;
use App\Services\PublicationService\ValueObject\ArticleId;
use Ramsey\Uuid\Uuid;

/**
 * Class DoctrineAuthorRepository
 * @package App\Services\PublicationService\Repository
 */
class DoctrineAuthorRepository extends EntityRepository implements AuthorRepositoryInterface
{

    public function nextIdentity()
    {
        return ArticleId::create(strtoupper(Uuid::uuid4()));
    }

    public function add(Author $author)
    {
        $this->getEntityManager()->persist($author);
    }

    public function remove(Author $author)
    {
        $this->getEntityManager()->remove($author);
    }
}