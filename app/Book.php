<?php

namespace App;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="books")
 *
 * @ORM\Entity
 */
class Book
{
    use \Kdyby\Doctrine\Entities\Attributes\UniversallyUniqueIdentifier;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="books")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", onDelete="SET NULL")
     *
     * @ORM\Column(type="string")
     */
    protected $author;

    /**
     * @ORM\Column(type="integer")
     */
    protected $pages;

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