<?php declare(strict_types = 1);

namespace Example\Page\Parsers;

interface MetadataParser
{
    public function parse(string $path);
}
