<?php declare(strict_types = 1);

namespace App\Services\PublicationService;

use App\Article;
use App\Author;
use App\Services\PublicationService\Events\PublicationListener;
use App\Services\PublicationService\Repository\DoctrineArticleRepository;
use App\Services\PublicationService\Repository\DoctrineAuthorRepository;
use App\Services\PublicationService\Requests\PublicationRequestInterface;
use Doctrine\ORM\EntityManager;
use Kdyby\Events\EventArgsList;
use Kdyby\Events\EventManager;
use Kdyby\Monolog\Logger;

/**
 * Class PublicationService
 * @package Services
 */
final class PublicationService
{
    /** @var \Monolog\Logger */
    private $logger;

    /** @var  EventManager */
    private $eventManager;

    /** @var EntityManager */
    private $entityManager;

    /** @var DoctrineArticleRepository */
    private $repository;

    public function test()
    {
        $this->logger->addAlert('test!');
        var_dump('test');
        die();
    }

    /**
     * PublicationService constructor.
     * @param Logger $logger
     * @param EventManager $em
     * @param EntityManager $entityManager
     */
    public function __construct(Logger $logger, EventManager $em, EntityManager $entityManager)
    {
        $this->logger        = $logger;
        $this->eventManager  = $em;
        $this->entityManager = $entityManager;
    }

    public function setRepository(DoctrineArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @return Author
     */
    private function createNewAuthor(string $name): Author
    {
        $author = new Author();
        $author->setName($name);
        $authorRepository = new DoctrineAuthorRepository($this->entityManager);
        $authorRepository->add($author);
        $authorRepository->save();

        return $author;
    }

    /**
     * @param PublicationRequestInterface $request
     */
    public function execute(PublicationRequestInterface $request)
    {
        $title   = $request->title();
        $authors = $request->authors();
        $pages   = $request->pages();

        $author = $this->entityManager->getRepository(Author::class);
        $author = $author->findBy(['name' => $authors]);
        if (!$author) {
            $author = $this->createNewAuthor($authors);
        }

        $this->repository->add(
            (new Article())->create($title, $author, $pages)
        );
        $this->repository->save();

        $this->eventManager->addEventSubscriber(new PublicationListener());
        $this->eventManager->dispatchEvent(
            'App\Services\PublicationService\Events\PublicationProcess::newPublication',
            new EventArgsList([$request, $this->logger]));
    }
}