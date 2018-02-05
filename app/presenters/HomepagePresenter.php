<?php

namespace App\Presenters;

use App\Article;
use App\Book;
use Kdyby\Doctrine\EntityManager;
use Nette;

/**
 * Class HomepagePresenter
 * @package App\Presenters
 */
class HomepagePresenter extends Nette\Application\UI\Presenter
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function renderDefault()
    {
        $books    = $this->entityManager->getRepository(Book::class);
        $articles = $this->entityManager->getRepository(Article::class);

        $this->template->books = $books->findAll();
        $this->template->articles = $articles->findAll();
    }
}
