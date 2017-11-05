<?php declare(strict_types = 1);

namespace Example\Page\Readers;

interface PageReader
{
    public function readBySlug(string $slug) : string;
}
