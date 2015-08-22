<?php
namespace BibliothequeTest;

use Bibliotheque\Author;
use Bibliotheque\AuthorMapper;

abstract class DatabaseTestCase extends \PHPUnit_Extensions_Database_TestCase
{
    static protected $pdo = null;
    protected $connection = null;

    /**
     * PHPUnit will serialize our class - we don't want $pdo or $connection to be serialised
     * @return array
     */
    public function __sleep()
    {
        return [];
    }

    public function getConnection()
    {
        if ($this->connection === null) {
            if (!self::$pdo) {
                self::$pdo = new \PDO('sqlite::memory:');
            }
            $this->connection = $this->createDefaultDBConnection(self::$pdo, ':memory');

            $this->createSchema(self::$pdo);
        }
        return $this->connection;
    }

    /**
     * Create the database tables
     *
     * @param  PDO $pdo
     */
    private function createSchema($pdo)
    {
        // create author table
        $pdo->exec(<<<SQL
CREATE TABLE IF NOT EXISTS author (
  id VARCHAR(36) NOT NULL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  biography TEXT
);
SQL
        );

        // create book table
        $pdo->exec(<<<SQL
CREATE TABLE IF NOT EXISTS book (
  id VARCHAR(36) NOT NULL PRIMARY KEY,
  author_id VARCHAR(36) NOT NULL,
  title VARCHAR(100) NOT NULL,
  isbn VARCHAR(13),

  FOREIGN KEY (author_id) REFERENCES author (id)
);
SQL
        );
    }
}
