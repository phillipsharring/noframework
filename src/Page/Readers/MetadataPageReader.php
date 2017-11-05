<?php declare(strict_types = 1);

namespace Example\Page\Readers;

interface MetadataPageReader
{
    public function readBySlug(string $slug);
}
