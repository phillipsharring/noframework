<?php declare(strict_types = 1);

namespace Example\Controllers;

use Http\Request;
use Http\Response;
use Example\Template\FrontendRenderer;
use Example\Page\Readers\MetadataPageReader;

class Homepage
{
    private $request;
    private $response;
    private $renderer;
    private $pageReader;

    public function __construct(Request $request, Response $response, FrontendRenderer $renderer, MetadataPageReader $pageReader)
    {
        $this->request = $request;
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
    }

    public function show()
    {
        if (null == $this->request->getParameter('s', null)) {
            $data['content'] = $this->pageReader->readBySlug('homepage');
            $template = 'Page';
        } else {
            $data = [
                'results' => [
                    [
                        'url' => '/about',
                        'title' => 'About',
                        'excerpt' => 'blah blah blah',
                    ]
                ],
            ];
            $template = 'SearchResults';
        }

        $html = $this->renderer->render($template, $data);
        $this->response->setContent($html);
    }
}
