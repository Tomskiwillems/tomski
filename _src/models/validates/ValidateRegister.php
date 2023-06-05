<?php

namespace tomski\_src\models\validates;

class ValidateRegister extends BaseValidate implements \tomski\_src\interfaces\iValidate
{
    
//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function validate(array $postresult, array $response): array|false
    {
        $userdatamodel = new \tomski\_src\data_access\datamodels\UserDatamodel();
        $result = $userdatamodel->getUserEmail($postresult['email']);
        if (!$result)
        {
            $insert = $userdatamodel->insertNewUser($postresult);
            if ($insert === false) return false;
            $response['page'] = 'Login';
			$response['message'] = 10;
        }
        else
        {
            $response['errormessage'] = 11;
        }
        return $response;
    }
}