<?php
require_once 'Library.php';

class LibraryManager {
    private $books = [];
    
    public function addBook(Library $book): void {
        $this->books[] = $book;
    }
    
    public function removeBook(string $isbn): bool {
        foreach ($this->books as $index => $book) {
            if ($book->ISBN === $isbn) {
                unset($this->books[$index]);
                $this->books = array_values($this->books);
                return true;
            }
        }
        return false;
    }
    
    public function getAllBooks(): array {
        return $this->books;
    }
    
    public function findByTitle(string $title): array {
        $found = [];
        foreach ($this->books as $book) {
            if (stripos($book->title, $title) !== false) {
                $found[] = $book;
            }
        }
        return $found;
    }
    
    public function findByAuthor(string $author): array {
        $found = [];
        foreach ($this->books as $book) {
            if (stripos($book->author, $author) !== false) {
                $found[] = $book;
            }
        }
        return $found;
    }
    
    public function findByGenre(Genre $genre): array {
        $found = [];
        foreach ($this->books as $book) {
            if ($book->type === $genre) {
                $found[] = $book;
            }
        }
        return $found;
    }
    
    public function findByISBN(string $isbn) {
        foreach ($this->books as $book) {
            if ($book->ISBN === $isbn) {
                return $book; 
            }
        }
        return false;  
    }
    
    public function getLargeBooks(): array {
        $largeBooks = [];
        foreach ($this->books as $book) {
            if ($book->pageNumbers > 500) {
                $largeBooks[] = $book;
            }
        }
        return $largeBooks;
    }
    
    public function updateBook(string $isbn, Library $updatedBook): bool {
        foreach ($this->books as $index => $book) {
            if ($book->ISBN === $isbn) {
                $this->books[$index] = $updatedBook;
                return true;
            }
        }
        return false;
    }
        
}
?>