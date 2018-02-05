<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="articles")
 *
 * @ORM\Entity
 */
class Article implements ModelInterface
{
    use \Kdyby\Doctrine\Entities\Attributes\UniversallyUniqueIdentifier;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var Article|null
     *
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="articles")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    protected $author;

    /**
     * @ORM\Column(type="integer")
     */
    protected $pages;

    /**
     * @param $title
     * @param Author $authors
     * @param $page
     * @return $this
     */
    public function create($title, Author $authors, $page)
    {
        $this->title   = $title;
        $this->author  = $authors;
        $this->pages   = (int)$page;

        return $this;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set pages
     *
     * @param string $pages
     * @return Book
     */
    public function setPages($pages)
    {
        $this->title = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return string
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set author
     *
     * @param Author $author
     * @return Book
     */
    public function setAuthor(Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

}