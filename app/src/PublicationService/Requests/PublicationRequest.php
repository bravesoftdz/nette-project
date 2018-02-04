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
    private $amount;

    /**
     * PublicationRequest constructor.
     * @param $title
     * @param $authors
     * @param $page
     * @param $amount
     */
    public function __construct($title, $authors, $page, $amount)
    {
        $this->title   = $title;
        $this->authors = $authors;
        $this->pages   = (int)$page;
        $this->amount  = (int)$amount;
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

    public function amount()
    {
        return $this->amount;
    }

    public function type()
    {
        return static::TYPE;
    }
}