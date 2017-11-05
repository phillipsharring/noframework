<?php declare(strict_types = 1);

namespace Example\Menu;

class ArrayMenuReader implements MenuReader
{
    public function readMenu() : array
    {
        return [
            ['href' => '/', 'text' => 'Home'],
            ['href' => '/about', 'text' => 'About'],
            ['href' => '/work', 'text' => 'Work'],
        ];
    }
}
