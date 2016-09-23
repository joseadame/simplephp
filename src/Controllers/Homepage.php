<?php

namespace Example\Controllers;

use Http\Response;
use Http\Request;
use Example\Template\FrontendRenderer;

class Homepage
{
	private $response;
	private $request;
	private $renderer;

	public function __construct(Response $response, Request $request, FrontendRenderer $renderer)
	{
		$this->response = $response;
		$this->request = $request;
		$this->renderer = $renderer;
	}

	public function showAction()
	{
		$data = [
            'name' => $this->request->getParameter('name', 'stranger'),
            'menuItems' => [['href' => '/public/', 'text'=> 'HomePage']]
        ];
        $html = $this->renderer->render('HomePage', $data);
		$this->response->setContent($html);
	}

}