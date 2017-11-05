<?php declare(strict_types = 1);

namespace Example\Page;

interface Parser
{
    public function parse(string $content) : string;
}
