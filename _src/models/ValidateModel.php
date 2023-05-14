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

	public function validateRequest()
	{
        $this->response = $this->response;
        $this->response['message'] = $this->response['errormessage'] = '';
		if ($this->request['posted'])
		{
			$formfieldfactory = new \tomski\_src\factories\FormFieldFactory();
			$formfields = $formfieldfactory->getFormfields($this->request['page']);
			$validateformfields = new validates\ValidateFormFields($formfields);
			$result = $validateformfields->validateFields();
			if ($result)
			{
				$postresult = $validateformfields->getPostresult();
                $class = "\\tomski\_src\models\\validates\\Validate".$this->request['page'];
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
                $this->response['page'] = 'Home';
                $this->response['message'] = "You are successfully logged out.";
			}
		}
		return $this->response;
	}
}