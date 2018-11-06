<?php
namespace Proxy1;



interface IDownloader
{
    /**
     * @param string $url
     * @return string
     */
    public function download(string $url): string;
}

class SimpleDownloader implements IDownloader
{
    /**
     * @inheritdoc
     */
    public function download(string $url): string
    {
        // Downloading a file from the Internet.
        $result = file_get_contents($url);
        return $result;
    }

    // implement logic for create cache
    // implement logic for invalidate cache
}

/**
 * @param IDownloader $downloader
 */
function clientCode(IDownloader $downloader)
{
    // ...
    $downloader->download("http://example.com/");
    $downloader->download("http://example2.com/");
    $downloader->download("http://example.com/");
    $downloader->download("http://example3.com/");
    // ...
}


$downloader = new SimpleDownloader();
clientCode($downloader);

