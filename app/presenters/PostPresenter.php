<?php

namespace App\Presenters;

use App\Services\PublicationService\Exceptions\PublicationAlreadyExist;
use App\Services\PublicationService\PublicationService;
use App\Services\PublicationService\Repository\DoctrineArticleRepository;
use App\Services\PublicationService\Requests\ArticleRequest;
use Kdyby\Doctrine\EntityManager;
use Nette;
use Nette\Application\UI\Form;

/**
 * Class PostPresenter
 * @package App\Presenters
 */
class PostPresenter extends Nette\Application\UI\Presenter
{
    /** @var PublicationService */
    private $publicationService;

    /** @var EntityManager */
    private $entityManager;

    /**
     * PostPresenter constructor.
     *
     * @param PublicationService $publicationService
     * @param EntityManager $em
     */
    public function __construct(PublicationService $publicationService, EntityManager $em)
    {
        $this->entityManager      = $em;
        $this->publicationService = $publicationService;
    }

    protected function createComponentPostForm()
    {
        $form = new Form;
        $form->addText('title', 'Title:')->setRequired();
        $form->addText('author', 'Author:')->setRequired();
        $form->addInteger('pages', 'Pages:')->setRequired();

        $form->addSubmit('send', 'Save');
        $form->onSuccess[] = [$this, 'postFormSucceeded'];

        return $form;
    }

    /**
     * @param $form
     * @param $values
     */
    public function postFormSucceeded($form, $values)
    {
        // TODO: save logic Start
        $request = new ArticleRequest($values->title, $values->author, $values->pages);
        try {
            $this->publicationService->setRepository(new DoctrineArticleRepository($this->entityManager));
            $this->publicationService->execute($request);
        } catch (PublicationAlreadyExist $e) {
            $this->redirect('Homepage:default');
        }
        // TODO: save logic End
        $this->flashMessage("Post was published", 'success');
        $this->redirect('Homepage:default');
    }

}