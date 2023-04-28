<?php

namespace tomski\_src\controllers;
use Exception;

class PageController
{
	protected $request;
	protected $response;

//  =============================================
//  PUBLIC METHODS
//  =============================================

	public function handleRequest()
	{
		$this->getRequest();
		$this->validateRequest();
		$this->showResponse();
	}

//  =============================================
//  PRIVATE METHODS
//  =============================================

	private function getRequest()
	{
		$posted = ($_SERVER['REQUEST_METHOD'] === 'POST');
		$this->request = [	'posted'	=> $posted,
							'page'  	=> \tomski\_src\tools\Tools::getRequestVar('page', $posted, 'home'),
							'id'		=> \tomski\_src\tools\Tools::getRequestVar('id', $posted, 0),
							'name'		=> \tomski\_src\tools\Tools::getRequestVar('name', $posted)];
	}

//  =============================================

	private function validateRequest()
	{
		$validatemodel = new \tomski\_src\models\ValidateModel($this->request);
		$this->response = $validatemodel->validateRequest();
	}

//  =============================================

	private function showResponse()
	{
		$page->show();
	}	
}