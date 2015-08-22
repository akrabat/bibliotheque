<?php
namespace BibliothequeTest;

use Bibliotheque\Book;

class BookTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $data = [
            'author_id' => '77707f1b-400c-3fe0-b656-c0b14499a71d',
            'title' => 'Lorem ipsum',
            'isbn' => '9780439678131',
        ];

        $book = new Book($data);

        $this->assertNull($book->getId());
        $this->assertSame($data['author_id'], $book->getAuthorId());
        $this->assertSame($data['title'], $book->getTitle());
        $this->assertSame($data['isbn'], $book->getIsbn());
        $this->assertNull($book->getDatePublished());
    }

    public function testAuthorIdMayNotBeEmpty()
    {
        $this->setExpectedException('InvalidArgumentException', 'Author id cannot be empty');
        $book = new Book([]);
    }

    public function testAuthorIdMayNotBeTooLong()
    {
        $this->setExpectedException('InvalidArgumentException', 'Author id must be less than 36 characters');
        $book = new Book([
            'author_id' => 'Lorem ipsum dolor sit amet, consectetur',
        ]);
    }

    public function testTitleMayNotBeEmpty()
    {
        $this->setExpectedException('InvalidArgumentException', 'Title cannot be empty');
        $book = new Book([
            'author_id' => '1234',
        ]);
    }

    public function testTitleMayNotBeTooLong()
    {
        $this->setExpectedException('InvalidArgumentException', 'Title must be less than 100 characters');
        $book = new Book([
            'author_id' => '1234',
            'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                       . ' Nulla at nunc scelerisque, tempor mauris sit',
        ]);
    }

    public function testThatEmptyFieldsBecomeNull()
    {
        $book = new Book([
            'id' => '',
            'author_id' => '1234',
            'title' => 'Lorem ipsum',
            'isdn' => '',
            'date_published' => '',
        ]);

        $this->assertNull($book->getId());
        $this->assertNull($book->getIsbn());
        $this->assertNull($book->getDatePublished());
    }
}
