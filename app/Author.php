<?php

namespace App;

use App\Services\PublicationService\ValueObject\AuthorId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="author")
 *
 * @ORM\Entity
 */
class Author implements ModelInterface
{
    use \Kdyby\Doctrine\Entities\Attributes\UniversallyUniqueIdentifier;

    /**
     * @ORM\Column(type="string")
     */
    public $name;

    /**
     * @ORM\OneToMany(targetEntity="Book", mappedBy="author", cascade={"persist", "remove"})
     */
    private $books;

    /**
     * @ORM\OneToMany(targetEntity="Article", mappedBy="author", cascade={"persist", "remove"})
     */
    private $articles;

    /**
     * Set name
     *
     * @param string $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add books
     *
     * @param Book $books
     *
     * @return Author
     */
    public function addBook(Book $books)
    {
        $this->books[] = $books;

        return $this;
    }

    /**
     * Remove books
     *
     * @param Book $books
     */
    public function removeBook(Book $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Add article
     *
     * @param Article $articles
     *
     * @return Author
     */
    public function addArticle(Article $articles)
    {
        $this->articles[] = $articles;

        return $this;
    }

    /**
     * Remove articles
     *
     * @param Article $articles
     */
    public function removeArticle(Article $articles)
    {
        $this->articles->removeElement($articles);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }
}