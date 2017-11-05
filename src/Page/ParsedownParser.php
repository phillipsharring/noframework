<?php declare(strict_types = 1);

namespace Example\Page;

use Parsedown;

class ParsedownParser implements Parser
{
    private $parsedown;

    public function __construct(Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function parse(string $content) : string
    {
        return $this->parsedown->text($content);
    }
}
