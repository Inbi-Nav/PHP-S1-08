<?php
use PHPUnit\Framework\TestCase;

require_once 'Library.php';
require_once 'LibraryManager.php';  


class LibraryTests extends TestCase {

    public function testCanCreateBook(){
        $book = new Library(
            "Harry Potter and the Philosopher's Stone",
            "J. K. Rowling",
            "978-0-7475-3269-9",
            Genre::Fantasy,
            233
        );
        $this->assertEquals("Harry Potter and the Philosopher's Stone", $book->title);
        $this->assertEquals("J. K. Rowling", $book->author);
        $this->assertEquals(Genre::Fantasy, $book->type);
    }
    
    public function testBookToString()
    {
        $book = new Library(
            "Treasure Island",
            "Robert Louis Stevenson",
            "978-0-141-43955-6", 
            Genre::Adventure,
            240
        );
        
        $expected = " Treasure Island | Robert Louis Stevenson | Adventure | 240";
        $this->assertEquals($expected, (string)$book);
    }
// Test add book
    public function testAddBookToLibraryManager()
    {
        $manager = new LibraryManager();
        $book = new Library(
            "The Hobbit",
            "J.R.R. Tolkien",
            "978-0547928227",
            Genre::Fantasy,
            310
    );
    
    $manager->addBook($book);
    $allBooks = $manager->getAllBooks();
    
    $this->assertCount(1, $allBooks);
    $this->assertEquals("The Hobbit", $allBooks[0]->title);
    }  
// test remove book
    public function testRemoveBookByISBN()
    {
        $manager = new LibraryManager();
        $book = new Library(
        "Dune",
        "Frank Herbert", 
        "978-0441013593",
        Genre::ScienceFiction,
        412
        );

        $manager->addBook($book);
        $result = $manager->removeBook("978-0441013593");

        $this->assertTrue($result);
        $this->assertCount(0, $manager->getAllBooks());
    }
// test genre
    public function testFindBooksByGenre()
    {
        $manager = new LibraryManager();
        $fantasyBook = new Library("Harry Potter", "J.K. Rowling", "123", Genre::Fantasy, 300);
        $adventureBook = new Library("Treasure Island", "R.L. Stevenson", "456", Genre::Adventure, 250);
        
        $manager->addBook($fantasyBook);
        $manager->addBook($adventureBook);
        
        $fantasyBooks = $manager->findByGenre(Genre::Fantasy);
        $this->assertCount(1, $fantasyBooks);
        $this->assertEquals("Harry Potter", $fantasyBooks[0]->title);
    }
// Test book title
    public function testFindBooksByTitle()
    {   
        $manager = new LibraryManager();
        $book = new Library("1984", "George Orwell", "789", Genre::Dytopia, 328);
        $manager->addBook($book);
        
        $foundBooks = $manager->findByTitle("1984");
        $this->assertCount(1, $foundBooks);
        $this->assertEquals("George Orwell", $foundBooks[0]->author);
    }   
//test ISBN 
    public function testFindByISBNFound()
    {
        $manager = new LibraryManager();
        $book = new Library("1984", "George Orwell", "978-0451524935", Genre::Dytopia, 328);
        $manager->addBook($book);
        
        $result = $manager->findByISBN("978-0451524935");
        $this->assertNotFalse($result);
        $this->assertEquals("1984", $result->title);
    }

    public function testFindByISBNNotFound()
    {
        $manager = new LibraryManager();
        $book = new Library("1984", "George Orwell", "978-0451524935", Genre::Dytopia, 328);
        $manager->addBook($book);
        
        $result = $manager->findByISBN("999-0000000000");
        $this->assertFalse($result);
    }
// Test large book
    public function testGetLargeBooks()
    {
        $manager = new LibraryManager();
        $smallBook = new Library("Small Book", "Author", "111", Genre::Story, 200);
        $largeBook = new Library("Large Book", "Author", "222", Genre::Fantasy, 600);
        
        $manager->addBook($smallBook);
        $manager->addBook($largeBook);
        
        $largeBooks = $manager->getLargeBooks();
        $this->assertCount(1, $largeBooks);
        $this->assertEquals("Large Book", $largeBooks[0]->title);   
    }   
// Test book update
    public function testUpdateBook()
    {
        $manager = new LibraryManager();
        $originalBook = new Library(
            "Original Title", 
            "Original Author", 
            "123", 
            Genre::Fantasy, 
            300
        );
        $manager->addBook($originalBook);

        $updatedBook = new Library(
            "Updated Title", 
            "Updated Author", 
            "123", 
            Genre::ScienceFiction, 
            400
        );
        $result = $manager->updateBook("123", $updatedBook);

        $this->assertTrue($result);
        $foundBook = $manager->findByISBN("123");
        $this->assertNotFalse($foundBook);
        $this->assertEquals("Updated Title", $foundBook->title);
        $this->assertEquals("Updated Author", $foundBook->author);
        $this->assertEquals(Genre::ScienceFiction, $foundBook->type);
        $this->assertEquals(400, $foundBook->pageNumbers);
    }

    public function testUpdateBookNotFound()
    {
        $manager = new LibraryManager();
        $book = new Library("Some Book", "Some Author", "999", Genre::Story, 200);
        
        $result = $manager->updateBook("000", $book);
        $this->assertFalse($result);
    }
}
?>