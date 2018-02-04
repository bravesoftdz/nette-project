<?php

namespace App\Services\PublicationService\Repository;

use Kdyby\Doctrine\EntityManager;

/**
 * Class EntityRepository
 * @package App\Services\PublicationService\Repository
 */
class EntityRepository
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getEntityManager()
    {
        return $this->entityManager;
    }
}