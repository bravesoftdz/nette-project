<?php

namespace App\Presenters;

use App\Article;
use App\Author;
use App\Services\PublicationService\Exceptions\PublicationAlreadyExist;
use App\Services\PublicationService\PublicationService;
use App\Services\PublicationService\Requests\BookRequest;
use Kdyby\Doctrine\EntityManager;
use Nette;

/**
 * Class HomepagePresenter
 * @package App\Presenters
 */
class HomepagePresenter extends Nette\Application\UI\Presenter
{
    private $publicationService;

    public function __construct(PublicationService $publicationService, EntityManager $entityManager)
    {

        $articles = $entityManager->getRepository(Article::class);

        $article = $articles->find(1);
        echo $article->getTitle();

        $this->publicationService = $publicationService;
        $request = new BookRequest(1,1,1,1);
        try {
            $this->publicationService->execute($request);
        } catch (PublicationAlreadyExist $e){
            // render to error or show error message
        }
    }
}
