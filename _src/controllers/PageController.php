<?php

namespace tomski\_src\controllers;

class PageController extends BaseController implements \tomski\_src\interfaces\iController
{
	protected $request;
	protected $response;

//  =============================================
//  PROTECTED METHODS
//  =============================================

	protected function generateResponse()
	{
		$this->getRequest();
		$this->validateRequest();
		$this->showResponse();
	}

//  =============================================

	protected function generateError($e)
	{
		header('HTTP/1.1 500 Internal Server Error');
        echo $e->getMessage();
	}

//  =============================================
//  PRIVATE METHODS
//  =============================================

	private function getRequest()
	{
		$posted = ($_SERVER['REQUEST_METHOD'] === 'POST');
		$this->request = [	'posted'	=> $posted,
							'page'  	=> \tomski\_src\tools\Tools::getRequestVar('page', $posted, 1),
							'id'		=> \tomski\_src\tools\Tools::getRequestVar('id', $posted, 0)];
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
		$pagemodel = new \tomski\_src\models\PageModel($this->response);
		$page = $pagemodel->makePage(true, '');
		$page->show();
	}	
}