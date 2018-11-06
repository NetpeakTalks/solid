<?php
namespace Simple2;

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

    /**
     * @return string
     */
    public function getCurrentPage()
    {
        return "current page content";
    }
}


interface IPrinter
{
    /**
     * @param string $pageContent
     */
    public function printPage(string $pageContent);
}


class PlainTextPrinter implements IPrinter
{
    /**
     * @inheritdoc
     */
    public function printPage(string $pageContent)
    {
        echo $pageContent;
    }
}


class HtmlPrinter implements IPrinter
{
    /**
     * @inheritdoc
     */
    public function printPage(string $pageContent)
    {
        echo '<div style="single-page">' . $pageContent . '</div>';
    }

}

$firstBook = new Book("A Super Book", "John Doe");
$firstBook->turnPage(2);

$printer = new PlainTextPrinter();
// or
$printer = new HtmlPrinter();

$printer->printPage($firstBook->getCurrentPage());

