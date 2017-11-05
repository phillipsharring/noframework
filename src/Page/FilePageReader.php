<?php declare(strict_types = 1);

namespace Example\Page;

class FilePageReader implements PageReader
{
    private $pageFolder;
    private $parser;

    public function __construct(string $pageFolder, Parser $parser)
    {
        $this->pageFolder = $pageFolder;
        $this->parser = $parser;
    }

    public function readBySlug(string $slug) : string
    {
        $path = "$this->pageFolder/$slug.md";

        if (!file_exists($path)) {
            throw new InvalidPageException($slug);
        }

        return $this->parser->parse(file_get_contents($path));
    }
}
