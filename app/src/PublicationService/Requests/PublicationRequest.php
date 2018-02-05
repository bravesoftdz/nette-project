<?php

namespace App\Services\PublicationService\Requests;

/**
 * Class ArticleRequest
 * @package App\Services\PublicationService\Requests
 */
abstract class PublicationRequest implements PublicationRequestInterface
{
    private $title;
    private $authors;
    private $pages;

    /**
     * PublicationRequest constructor.
     * @param $title
     * @param $authors
     * @param $page
     */
    public function __construct($title, $authors, $page)
    {
        $this->title   = $title;
        $this->authors = $authors;
        $this->pages   = (int)$page;
    }

    public function title()
    {
        return $this->title;
    }

    public function authors()
    {
        return $this->authors;
    }

    public function pages()
    {
        return $this->pages;
    }

    public function type()
    {
        return static::TYPE;
    }
}