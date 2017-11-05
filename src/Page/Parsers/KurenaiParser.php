<?php declare(strict_types = 1);

namespace Example\Page\Parsers;

use Kurenai\Parser as BaseParser;

class KurenaiParser implements MetadataParser
{
    private $pageFolder;
    private $parser;

    public function __construct(string $pageFolder, BaseParser $parser)
    {
        $this->pageFolder = $pageFolder;
        $this->parser = $parser;
    }

    public function parse(string $path)
    {
        $parsed = $this->parser->parse(file_get_contents($path));
        return $parsed;
    }
}
