<?php
namespace Bibliotheque;

use PDO;

class AuthorMapper
{
    protected $dbAdapter;

    public function __construct(PDO $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    /**
     * Fetch all Authors from the database, ordered by name
     *
     * @return Author[]
     */
    public function fetchAll()
    {
        $sql = "SELECT id, name, biography FROM author order by name";

        $statement = $this->dbAdapter->prepare($sql);

        $data = [];
        if ($statement->execute()) {
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $rows = $statement->fetchAll();
            foreach ($rows as $row) {
                $data[] = new Author($row);
            }
        }

        return $data;
    }

    /**
     * Load a single Author by its id
     *
     * @param  string $id
     * @return Author|null
     */
    public function loadById($id)
    {
        $sql = "SELECT id, name, biography FROM author WHERE id = :id";
        $params['id'] = $id;

        $statement = $this->dbAdapter->prepare($sql);

        if ($statement->execute($params)) {
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            if ($data) {
                return new Author($data);
            }
        }

        return null;
    }

    /**
     * Save an Author.
     *
     * @param  Author $author
     * @return boolean
     */
    public function save(Author $author)
    {
        $isInDatabase = $this->isIdInDatabase($author->getId());
        if ($isInDatabase) {
            return $this->update($author);
        } else {
            return $this->insert($author);
        }
    }

    /**
     * Delete an Author
     * @param  Author|string $author
     * @return boolean
     */
    public function delete($author)
    {
        $id = $author;
        if ($author instanceof Author) {
            $id = $author->getId();
        }

        $sql = 'DELETE FROM author where id = :id';
        $params = [
            'id' => $id,
        ];

        $statement = $this->dbAdapter->prepare($sql);
        if ($statement->execute($params)) {
            if ($author instanceof Author) {
                $author->setId(null);
            }
            return true;
        }
        return false;
    }

    /**
     * Create a new record in the database
     *
     * @param  Author $author
     * @return boolean
     */
    protected function insert(Author $author)
    {
        $id = Uuid::v4();

        $sql = 'INSERT INTO author (id, name, biography) VALUES (:id, :name, :biography)';
        $params = [
            'id' => $id,
            'name' => $author->getName(),
            'biography' => $author->getBiography(),
        ];

        $statement = $this->dbAdapter->prepare($sql);
        if ($statement->execute($params)) {
            $author->setId($id);
            return true;
        }
        return false;
    }

    /**
     * Update a record in the database
     *
     * @param  Author $author
     * @return boolean
     */
    protected function update(Author $author)
    {
        $sql = 'UPDATE author SET name =:name, biography = :biography WHERE id = :id';

        $params = [
            'name' => $author->getName(),
            'biography' => $author->getBiography(),
            'id' => $author->getId(),
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
        $sql = "SELECT id FROM author WHERE id = :id";
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
