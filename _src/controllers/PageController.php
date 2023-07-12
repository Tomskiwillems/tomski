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
		$this->request = $this->urlparams;
		$this->request['posted'] = ($_SERVER['REQUEST_METHOD'] === 'POST');
		$pagedatamodel = new \tomski\_src\data_access\datamodels\PageDatamodel;
		$mainpage = $pagedatamodel->getPageIDByURLParam($this->request[0]);
		if ($mainpage === false) return $this->request[0] = 1;
		$subpage = $pagedatamodel->getPageIDByURLParam($this->request[1], $mainpage);
		if ($subpage)
		{
			array_shift($this->request);
			$this->request[0] = $subpage;
		}
		else
		{
			$this->request[0] = $mainpage;
		}
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