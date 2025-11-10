<?php
require_once 'Library.php';

class LibraryManager {
    private $books = [];
    
    public function addBook($book) {
        $this->books[] = $book;
    }
    
    public function removeBook($isbn) {
        $newBooks = [];
        $removed = false;
        
        foreach ($this->books as $book) {
            if ($book->ISBN != $isbn) {
                $newBooks[] = $book;
            } else {
                $removed = true;
            }
        }
        
        $this->books = $newBooks;
        return $removed;
    }
    
    public function getAllBooks() {
        return $this->books;
    }
    
    public function findByTitle($title) {
        $found = [];
        foreach ($this->books as $book) {
            if (strtolower($book->title) == strtolower($title)) {
                $found[] = $book;
            }
        }
        return $found;
    }
    
    public function findByAuthor($author) {
        $found = [];
        foreach ($this->books as $book) {
            if (strtolower($book->author) == strtolower($author)) {
                $found[] = $book;
            }
        }
        return $found;
    }
    
    public function findByGenre($genre) {
        $found = [];
        foreach ($this->books as $book) {
            if ($book->type == $genre) {
                $found[] = $book;
            }
        }
        return $found;
    }
    
    public function findByISBN($isbn) {
        foreach ($this->books as $book) {
            if ($book->ISBN == $isbn) {
                return $book;
            }
        }
        return null;
    }
    
    public function getLargeBooks() {
        $largeBooks = [];
        foreach ($this->books as $book) {
            if ($book->pageNumbers > 500) {
                $largeBooks[] = $book;
            }
        }
        return $largeBooks;
    }
}
?>
