<?php

namespace tomski\_src\models;
use Exception;

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
		if ($this->request['posted'])
		{
			$formid = \tomski\_src\tools\Tools::getRequestVar('formid', true, 0);
			$formfieldfactory = new \tomski\_src\factories\FormFieldFactory();
			$formfields = $formfieldfactory->getFormfields($formid);
			//if ($formfields == false) throw new Exception('Requested FormFields could not be fetched from the database.');
			$validateformfields = new validates\ValidateFormFields($formfields);
			$result = $validateformfields->validateFields();
			if ($result)
			{
				$postresult = $validateformfields->getPostresult();
				$pagedatamodel = new \tomski\_src\data_access\datamodels\PageDatamodel;
				$pagename = $pagedatamodel->getPageName($this->request['page'], 'EN');
                $class = '\\tomski\_src\models\\validates\\Validate'.$pagename;
				if (class_exists($class))
				{
					$validatefunction = new $class;
					if ($validatefunction instanceof \tomski\_src\interfaces\iValidate)
					{
						$this->response = $validatefunction->validate($postresult, $this->response);
						if ($this->response == false) throw new Exception('The request could not be properly validated.');
					}
					else
					{
						throw new Exception('Requested ValidateFunction '.$class.' is not an instance of iValidate.');
					}
				}
				else
				{
					throw new Exception('Requested ValidateFunction '.$class.' is not an existing class.');
				}
			}
			else
			{
				$this->response['formfields'] = $formfields;
			}
		}
		else
		{
			if (isset($_GET['language']) || !isset($_SESSION['language']))
			{
				$language = \tomski\_src\tools\Tools::getRequestVar('language', false, 'EN');
				$optiondatamodel = new \tomski\_src\data_access\datamodels\OptionDatamodel();
        		$language_options = $optiondatamodel->getLanguageOptions();
				foreach ($language_options as $language_code => $language_option)
				{
					if ($language == $language_code) $_SESSION['language'] = $language;
				}
			}
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