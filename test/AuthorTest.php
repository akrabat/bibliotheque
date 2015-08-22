<?php
namespace BibliothequeTest;

use Bibliotheque\Author;

class AuthorTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $data = [
            'name' => 'Rob Allen',
            'biography' => 'Lorem ipsum dolor sit amet',
        ];

        $author = new Author($data);

        $this->assertEmpty($author->getId());
        $this->assertSame($data['name'], $author->getName());
        $this->assertSame($data['biography'], $author->getBiography());
    }

    public function testNameMayNotBeEmpty()
    {
        $this->setExpectedException('InvalidArgumentException', 'Name cannot be empty');
        $author = new Author([]);
    }

    public function testNameMayNotBeTooLong()
    {
        $this->setExpectedException('InvalidArgumentException', 'Name must be less than 100 characters');
        $author = new Author([
            'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                       . ' Nulla at nunc scelerisque, tempor mauris sit',
        ]);
    }

    public function testThatAnEmptyIdOrBiographyBecomesNull()
    {
        $author = new Author([
            'id' => '',
            'name' => 'Rob',
            'biography' => '',
        ]);

        $this->assertNull($author->getId());
        $this->assertNull($author->getBiography());
    }
}
