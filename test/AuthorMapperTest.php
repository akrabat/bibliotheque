<?php
namespace BibliothequeTest;

use Bibliotheque\Author;
use Bibliotheque\AuthorMapper;

class AuthorMapperTest extends DatabaseTestCase
{
    public function getDataSet()
    {
        return $this->createXMLDataset(__DIR__ . '/fixtures/author-seed.xml');
    }

    public function testFetchAll()
    {
        $mapper = new AuthorMapper($this->connection->getConnection());

        $authors = $mapper->fetchAll();
        $this->assertSame(2, count($authors));
        $this->assertTrue($authors[1] instanceof Author);
        $this->assertSame('Suzanne Collins', $authors[1]->getName());
    }

    public function testLoadById()
    {
        $mapper = new AuthorMapper($this->connection->getConnection());

        $author = $mapper->loadById('f075512f-9734-304c-b839-b86174143c07');

        $this->assertTrue($author instanceof Author);
        $this->assertSame('Anne McCaffrey', $author->getName());
    }

    public function testLoadByIdWithInvalidId()
    {
        $mapper = new AuthorMapper($this->connection->getConnection());

        $author = $mapper->loadById('not-here');

        $this->assertNull($author);
    }

    public function testCreateNewAuthor()
    {
        $mapper = new AuthorMapper($this->connection->getConnection());

        $data = [
            'name' => 'Rob Allen',
            'biography' => 'Lorem ipsum',
            ];
        $author = new Author($data);

        $this->assertEmpty($author->getId());
        $result = $mapper->save($author);

        $this->assertTrue($result);
        $this->assertNotEmpty($author->getId());

        // read database to check we now have three records
        $authors = $mapper->fetchAll();
        $this->assertSame(3, count($authors));

        // Rob Allen will be at index 1 as he's after Anne and before Suzanne
        $this->assertSame('Rob Allen', $authors[1]->getName());
        $this->assertSame('Lorem ipsum', $authors[1]->getBiography());
    }

    public function testSaveAuthor()
    {
        $mapper = new AuthorMapper($this->connection->getConnection());

        $author = $mapper->loadById('f075512f-9734-304c-b839-b86174143c07');

        $author->setName('Anne McCaffrey!');
        $author->setBiography('Lorem ipsum');

        $result = $mapper->save($author);

        $author2 = $mapper->loadById('f075512f-9734-304c-b839-b86174143c07');
        $this->assertSame('Anne McCaffrey!', $author2->getName());
        $this->assertSame('Lorem ipsum', $author2->getBiography());
    }

    public function testDeleteAuthorUsingAuthorObject()
    {
        $mapper = new AuthorMapper($this->connection->getConnection());

        $author = $mapper->loadById('f075512f-9734-304c-b839-b86174143c07');

        $result = $mapper->delete($author);
        $this->assertTrue($result);
        $this->assertNull($author->getId());

        // read database to check we now have one record
        $authors = $mapper->fetchAll();
        $this->assertSame(1, count($authors));
    }

    public function testDeleteAuthorUsingId()
    {
        $mapper = new AuthorMapper($this->connection->getConnection());

        $result = $mapper->delete('f075512f-9734-304c-b839-b86174143c07');
        $this->assertTrue($result);

        // read database to check we now have one record
        $authors = $mapper->fetchAll();
        $this->assertSame(1, count($authors));
    }
}
