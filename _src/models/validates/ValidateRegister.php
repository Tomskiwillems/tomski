<?php

namespace tomski\_src\models\validates;

class ValidateRegister extends BaseValidate implements \tomski\_src\interfaces\iValidate
{
    
//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function validate(): array|false
    {
        $userdatamodel = new \tomski\_src\data_access\datamodels\UserDatamodel();
        $result = $userdatamodel->getUserEmail($this->postresult['email']);
        if (!$result)
        {
            $insert = $userdatamodel->insertNewUser($this->postresult);
            if ($insert === false) return false;
            $this->response['page'] = 'Login';
			$this->response['message'] = "You are successfully registered.";
        }
        else
        {
            $this->response['errormessage'] = "That email adress is already registered";
        }
        return $this->response;
    }
}