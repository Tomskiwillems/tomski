<?php

namespace tomski\_src\models;

class ValidateModel
{
	protected $request;
	protected $response;

//  =============================================
//  PUBLIC METHODS
//  =============================================

	public function __construct(array $request)
	{
		$this->request = $request;
	}

//  =============================================

	public function validateRequest()
	{
        $this->response = $this->request;
        //$this->response['message'] = $this->response['errormessage'] = '';
		if ($this->request['posted'])
		{
			$formfieldfactory = new \tomski\_src\factories\FormFieldFactory();
			$formfields = $formfieldfactory->getFormfields($this->request['page'], $this->request['language']);
			$validateformfields = new validates\ValidateFormFields($formfields);
			$result = $validateformfields->validateFields();
			if ($result)
			{
				$postresult = $validateformfields->getPostresult();
				$pagedatamodel = new \tomski\_src\data_access\datamodels\PageDatamodel;
				$pagename = $pagedatamodel->getPageName($this->request['page']);
                $class = '\\tomski\_src\models\\validates\\Validate'.$pagename;
				if (class_exists($class))
				{
					$validatefunction = new $class;
					if ($validatefunction instanceof \tomski\_src\interfaces\iValidate)
					{
						$this->response = $validatefunction->validate($postresult, $this->response);
						// IF $this->response == false, iets doen.
					}
					// ELSE TOEVOEGEN
				}
				// ELSE TOEVOEGEN
			}
			else
			{
				$this->response['formfields'] = $formfields;
			}
		}
		else
		{
			if ($this->request['page'] == "Logout")
			{
                session_unset();
                session_destroy();
                $this->response['page'] = 1;
                $this->response['message'] = 12;
			}
		}
		return $this->response;
	}
}