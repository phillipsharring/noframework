<?php declare(strict_types = 1);

namespace Example\Page\Parsers;

interface Parser
{
    public function parse(string $path) : string;
}
