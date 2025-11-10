<?php
require_once 'Genre.php';

class Library {
    public function __construct(
        public string $title,
        public string $author,
        public string $ISBN,  
        public Genre $type,
        public int $pageNumbers  
    ){}

    public function __toString()
    {
       return " {$this->title} | {$this->author} | {$this->type->name} | {$this->pageNumbers}";
    }
}   
?>