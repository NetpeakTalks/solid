<?php
namespace Simple1;

class Book
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $author;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     */
    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param int $pageCount
     */
    public function turnPage(int $pageCount = 1)
    {
        // pointer to next page
    }

    public function printCurrentPage()
    {
        echo "current page content";
    }

}

$firstBook = new Book("A Super Book", "John Doe");
$firstBook->turnPage(2);
$firstBook->printCurrentPage();

