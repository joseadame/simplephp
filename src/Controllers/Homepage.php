<?php

namespace Example\Controllers;

use Http\Response;

class Homepage
{
	private $response;

	public function __construct(Response $response)
	{
		$this->response = $response;
	}
	
	public function showAction()
	{
		echo 'Hello World';
	}

}