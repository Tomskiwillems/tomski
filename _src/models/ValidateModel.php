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
			$formfieldcollection = $formfieldfactory->getFieldCollection($this->request['page']);
			$validateformfields = new ValidateFormFields($formfieldcollection);
			$result = $validateformfields->validate();
			if ($result)
			{
				$postresult = $validateformfields->getPostresult();
                $class = "\\tomski\_src\models\\validates\\Validate".$this->request['page'];
				$validatefunction = new $class;
                $this->response = $validatefunction->validate($postresult, $this->response);
				// IF $this->response == false, iets doen.
			}
			else
			{
				$this->response['formfieldcollection'] = $formfieldcollection;
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