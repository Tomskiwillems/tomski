<?php

namespace tomski\_src\models\validates;

class ValidateLogin extends BaseValidate implements \tomski\_src\interfaces\iValidate
{
    
//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function validate(): array
    {
        $userdatamodel = new \tomski\_src\data_access\datamodels\UserDatamodel();
        $result = $userdatamodel->getUserLoginData($this->postresult['email']);
        if (!$result)
        {
            if($result["password"] == $this->postresult["password"])
			{
                $_SESSION["user_id"] = $result["id"];
                $this->response['page'] = "Home";
                $this->response['message'] = 3;
            }
            else
            {
                $this->response['errormessage'] = 4;
            }
        }
        else
        {
            $this->response['errormessage'] = 5;
        }
        return $this->response;
    }
}