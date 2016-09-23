<?php

namespace Example\Template;

class FrontendTwigRenderer implements FrontendRenderer
{
    private $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function render($template, $data = [])
    {
        $data = array_merge($data, [
            'menuItems' => [['href' => '/public/', 'text' => 'Homepage']],
        ]);
        return $this->renderer->render($template, $data);
    }
}