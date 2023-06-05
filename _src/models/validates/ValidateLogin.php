<?php

namespace tomski\_src\models\validates;

class ValidateLogin extends BaseValidate implements \tomski\_src\interfaces\iValidate
{
    
//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function validate(array $postresult, array $response): array|false
    {
        $userdatamodel = new \tomski\_src\data_access\datamodels\UserDatamodel();
        $result = $userdatamodel->getUserLoginData($postresult['email']);
        if (!$result)
        {
            if($result["password"] == $postresult["password"])
			{
                $_SESSION["user_id"] = $result["id"];
                $response['page'] = "Home";
                $response['message'] = 7;
            }
            else
            {
                $response['errormessage'] = 8;
            }
        }
        else
        {
            $response['errormessage'] = 9;
        }
        return $response;
    }
}