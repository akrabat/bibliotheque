<?php
namespace Bibliotheque;

use PDO;

class BookMapper
{
    protected $dbAdapter;

    public function __construct(PDO $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * Fetch all Books from the database, ordered by date_published and then title
     *
     * @return Book[]
     */
    public function fetchAll()
    {
        $sql = "SELECT id, author_id, title, isbn, date_published FROM book ORDER BY date_published, title";

        $statement = $this->dbAdapter->prepare($sql);

        $data = [];
        if ($statement->execute()) {
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $statement->fetchAll();
            foreach ($rows as $row) {
                $data[] = new Book($row);
            }
        }

        return $data;
    }

    /**
     * Fetch all Books for a given author, ordered by date_published and then title
     *
     * @return Book[]
     */
    public function fetchByAuthor($authorId)
    {
        $sql = "SELECT id, author_id, title, isbn, date_published FROM book
                WHERE author_id = :author_id ORDER BY date_published, title";
        $params = [
            'author_id' => $authorId,
        ];

        $statement = $this->dbAdapter->prepare($sql);

        $data = [];
        if ($statement->execute($params)) {
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $statement->fetchAll();
            foreach ($rows as $row) {
                $data[] = new Book($row);
            }
        }

        return $data;
    }

    /**
     * Load a single Book by its id
     *
     * @param  string $id
     * @return Book|null
     */
    public function loadById($id)
    {
        $sql = "SELECT id, author_id, title, isbn, date_published FROM book WHERE id = :id";
        $params['id'] = $id;

        $statement = $this->dbAdapter->prepare($sql);

        if ($statement->execute($params)) {
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return new Book($data);
            }
        }

        return null;
    }

    /**
     * Save an Book.
     *
     * @param  Book $book
     * @return boolean
     */
    public function save(Book $book)
    {
        $isInDatabase = $this->isIdInDatabase($book->getId());
        if ($isInDatabase) {
            return $this->update($book);
        } else {
            return $this->insert($book);
        }
    }

    /**
     * Delete an Book
     * @param  Book|string $book
     * @return boolean
     */
    public function delete($book)
    {
        $id = $book;
        if ($book instanceof Book) {
            $id = $book->getId();
        }

        $sql = 'DELETE FROM book where id = :id';
        $params = [
            'id' => $id,
        ];

        $statement = $this->dbAdapter->prepare($sql);
        if ($statement->execute($params)) {
            if ($book instanceof Book) {
                $book->setId(null);
            }
            return true;
        }
        return false;
    }

    /**
     * Create a new record in the database
     *
     * @param  Book $book
     * @return boolean
     */
    protected function insert(Book $book)
    {
        $id = Uuid::v4();

        $sql = 'INSERT INTO book (id, author_id, title, isbn, date_published)
                VALUES (:id, :author_id, :title, :isbn, :date_published)';
        $params = [
            'id' => $id,
            'author_id' => $book->getAuthorId(),
            'title' => $book->getTitle(),
            'isbn' => $book->getIsbn(),
            'date_published' => $book->getDatePublished(),
        ];

        $statement = $this->dbAdapter->prepare($sql);
        if ($statement->execute($params)) {
            $book->setId($id);
            return true;
        }
        return false;
    }

    /**
     * Update a record in the database
     *
     * @param  Book $book
     * @return boolean
     */
    protected function update(Book $book)
    {
        $sql = 'UPDATE book SET author_id =:author_id, title = :title,
                isbn = :isbn, date_published = :date_published
                WHERE id = :id';

        $params = [
            'author_id' => $book->getAuthorId(),
            'title' => $book->getTitle(),
            'isbn' => $book->getIsbn(),
            'date_published' => $book->getDatePublished(),
            'id' => $book->getId(),
        ];

        $statement = $this->dbAdapter->prepare($sql);
        return $statement->execute($params);
    }

    /**
     * Is this id in the database?
     *
     * @param  string  $id
     * @return boolean
     */
    protected function isIdInDatabase($id)
    {
        $sql = "SELECT id FROM book WHERE id = :id";
        $params['id'] = $id;

        $statement = $this->dbAdapter->prepare($sql);

        if ($statement->execute($params)) {
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return true;
            }
        }

        return false;
    }
}
