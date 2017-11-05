<?php declare(strict_types = 1);

$injector = new \Auryn\Injector;

$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);
$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

/*
$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html',
        ]),
    ],
]);
// */

$injector->delegate('Twig_Environment', function () use ($injector) {
    $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
    $twig = new Twig_Environment($loader);
    return $twig;
});
$injector->alias('Example\Template\Renderer', 'Example\Template\TwigRenderer');
$injector->alias('Example\Template\FrontendRenderer', 'Example\Template\FrontendTwigRenderer');

$injector->alias('Example\Menu\MenuReader', 'Example\Menu\ArrayMenuReader');
$injector->share('Example\Menu\ArrayMenuReader');

$injector->define('Example\Page\Readers\MarkdownPageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);
$injector->alias('Example\Page\Readers\MetadataPageReader', 'Example\Page\Readers\MarkdownPageReader');
$injector->share('Example\Page\Readers\MarkdownPageReader');

$injector->delegate('Example\Page\Parsers\KurenaiParser', function () use ($injector) {
    $pageFolder = __DIR__ . '/../pages';
    $kurenai = new Kurenai\Parser(
        new Kurenai\Parsers\Metadata\JsonParser,
        new Kurenai\Parsers\Content\MarkdownParser
    );
    $parser = new Example\Page\Parsers\KurenaiParser($pageFolder, $kurenai);
    return $parser;
});
$injector->alias('Example\Page\Parsers\MetadataParser', 'Example\Page\Parsers\KurenaiParser');
$injector->share('Example\Page\Parsers\KurenaiParser');

return $injector;
