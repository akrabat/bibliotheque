<?php
namespace Bibliotheque;

use InvalidArgumentException;

class Book
{
    protected $id;
    protected $authorId;
    protected $title;
    protected $isbn;
    protected $datePublished;

    public function __construct(array $data = [])
    {
        $id = array_key_exists('id', $data) ? $data['id'] : $this->id;
        $this->setId($id);

        $authorId = array_key_exists('author_id', $data) ? $data['author_id'] : $this->authorId;
        $this->setAuthorId($authorId);

        $title = array_key_exists('title', $data) ? $data['title'] : $this->title;
        $this->setTitle($title);

        $isbn = array_key_exists('isbn', $data) ? $data['isbn'] : $this->isbn;
        $this->setIsbn($isbn);

        $datePublished = array_key_exists('date_published', $data) ? $data['date_published'] : $this->datePublished;
        $this->setDatePublished($datePublished);
    }

    /**
     * Getter for id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Setter for id
     *
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = trim((string)$id);
        if (empty($this->id)) {
            $this->id = null;
        }

        return $this;
    }

    /**
     * Getter for authorId
     *
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * Setter for authorId
     *
     * @param mixed $authorId Value to set
     * @return self
     */
    public function setAuthorId($authorId)
    {
        $authorId = trim((string)$authorId);
        if (empty($authorId)) {
            throw new InvalidArgumentException('Author id cannot be empty');
        } elseif (strlen($authorId) > 36) {
            throw new InvalidArgumentException('Author id must be less than 36 characters');
        }

        $this->authorId = $authorId;
        return $this;
    }

    /**
     * Getter for title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

   /**
    * Setter for title
    *
    * @param mixed $title Value to set
    * @return self
    */
    public function setTitle($title)
    {
        $title = trim((string)$title);
        if (empty($title)) {
            throw new InvalidArgumentException('Title cannot be empty');
        } elseif (strlen($title) > 100) {
            throw new InvalidArgumentException('Title must be less than 100 characters');
        }

        $this->title = $title;
        return $this;
    }

    /**
     * Getter for isbn
     *
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * Setter for isbn
     *
     * @param mixed $isbn Value to set
     * @return self
     */
    public function setIsbn($isbn)
    {
        $this->isbn = trim((string)$isbn);
        if (empty($this->isbn)) {
            $this->isbn = null;
        }

        return $this;
    }

    /**
     * Getter for datePublished
     *
     * @return mixed
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * Setter for datePublished
     *
     * @param mixed $datePublished Value to set
     * @return self
     */
    public function setDatePublished($datePublished)
    {
        $this->datePublished = trim((string)$datePublished);
        if (empty($this->datePublished)) {
            $this->datePublished = null;
        }

        return $this;
    }
}
