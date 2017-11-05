<?php declare(strict_types = 1);

namespace Example\Page\Readers;

use Example\Page\Parsers\MetadataParser;

class MarkdownPageReader implements MetadataPageReader
{
    private $pageFolder;
    private $parser;

    public function __construct(string $pageFolder, MetadataParser $parser)
    {
        $this->pageFolder = $pageFolder;
        $this->parser = $parser;
    }

    public function readBySlug(string $slug)
    {
        $path = "$this->pageFolder/$slug.md";

        if (!file_exists($path)) {
            throw new InvalidPageException($slug);
        }

        return $this->parser->parse($path);
    }
}
