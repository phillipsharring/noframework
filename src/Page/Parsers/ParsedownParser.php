<?php declare(strict_types = 1);

namespace Example\Page\Parsers;

use Parsedown;

class ParsedownParser implements Parser
{
    private $parser;

    public function __construct(Parsedown $parser)
    {
        $this->parser = $parser;
    }

    public function parse(string $path) : string
    {
        return $this->parser->text(file_get_contents($path));
    }
}
