<?php
namespace BibliothequeTest;

use Bibliotheque\Book;
use Bibliotheque\BookMapper;

class BookMapperTest extends DatabaseTestCase
{
    public function getDataSet()
    {
        return $this->createXMLDataset(__DIR__ . '/fixtures/book-seed.xml');
    }

    public function testFetchAll()
    {
        $mapper = new BookMapper($this->connection->getConnection());

        $books = $mapper->fetchAll();
        $this->assertSame(3, count($books));
        $this->assertTrue($books[1] instanceof Book);
        $this->assertSame('04bd0716-055b-37a6-9aa7-0adc89597944', $books[1]->getId());
    }

    public function testFetchByAuthor()
    {
        $mapper = new BookMapper($this->connection->getConnection());

        $books = $mapper->fetchByAuthor('77707f1b-400c-3fe0-b656-c0b14499a71d');
        $this->assertSame(3, count($books));
        $this->assertTrue($books[1] instanceof Book);
        $this->assertSame('04bd0716-055b-37a6-9aa7-0adc89597944', $books[1]->getId());

        $books = $mapper->fetchByAuthor('f075512f-9734-304c-b839-b86174143c07');
        $this->assertTrue(is_array($books));
        $this->assertSame(0, count($books));
    }

    public function testLoadById()
    {
        $mapper = new BookMapper($this->connection->getConnection());

        $book = $mapper->loadById('04bd0716-055b-37a6-9aa7-0adc89597944');

        $this->assertTrue($book instanceof Book);
        $this->assertSame('Gregor and the Prophecy of Bane', $book->getTitle());
    }

    public function testLoadByIdWithInvalidId()
    {
        $mapper = new BookMapper($this->connection->getConnection());

        $book = $mapper->loadById('not-here');

        $this->assertNull($book);
    }

    public function testCreateNewBook()
    {
        $mapper = new BookMapper($this->connection->getConnection());

        $data = [
            'author_id' => 'f075512f-9734-304c-b839-b86174143c07',
            'title' => 'Lorem ipsum',
            'isbn' => '9780689305078',
            'date_published' => '2099-01-01',
            ];
        $book = new Book($data);

        $this->assertEmpty($book->getId());
        $result = $mapper->save($book);

        $this->assertTrue($result);
        $this->assertNotEmpty($book->getId());

        // read database to check we now have three records
        $books = $mapper->fetchAll();
        $this->assertSame(4, count($books));

        // This book will be last as it's title starts with zzz
        $this->assertSame($data['author_id'], $books[3]->getAuthorid());
        $this->assertSame($data['title'], $books[3]->getTitle());
    }

    public function testSaveBook()
    {
        $mapper = new BookMapper($this->connection->getConnection());

        $book = $mapper->loadById('04bd0716-055b-37a6-9aa7-0adc89597944');

        $book->setAuthorId('f075512f-9734-304c-b839-b86174143c07');
        $book->setTitle('Lorem ipsum');
        $book->setIsbn('0747532699');
        $book->setDatePublished('2009-01-02');

        $result = $mapper->save($book);

        $book2 = $mapper->loadById('04bd0716-055b-37a6-9aa7-0adc89597944');
        $this->assertSame('f075512f-9734-304c-b839-b86174143c07', $book2->getAuthorId());
        $this->assertSame('Lorem ipsum', $book2->getTitle());
        $this->assertSame('0747532699', $book2->getIsbn());
        $this->assertSame('2009-01-02', $book2->getDatePublished());
    }

    public function testDeleteBookUsingBookObject()
    {
        $mapper = new BookMapper($this->connection->getConnection());

        $book = $mapper->loadById('04bd0716-055b-37a6-9aa7-0adc89597944');

        $result = $mapper->delete($book);
        $this->assertTrue($result);
        $this->assertNull($book->getId());

        // read database to check we now have one record
        $books = $mapper->fetchAll();
        $this->assertSame(2, count($books));
    }

    public function testDeleteBookUsingId()
    {
        $mapper = new BookMapper($this->connection->getConnection());

        $result = $mapper->delete('04bd0716-055b-37a6-9aa7-0adc89597944');
        $this->assertTrue($result);

        // read database to check we now have one record
        $books = $mapper->fetchAll();
        $this->assertSame(2, count($books));
    }
}
