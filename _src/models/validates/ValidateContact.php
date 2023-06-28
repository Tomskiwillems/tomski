<?php

namespace tomski\_src\models\validates;

class ValidateContact extends BaseValidate implements \tomski\_src\interfaces\iValidate
{
    
//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function validate(array $postresult, array $response): array|false
    {
        //mail(\Config::EMAIL, 'Contactmessage from '.$postresult['name'], $postresult['message'], 'From: '.$postresult['email']);
        $response['page'] = 1;
        //$response['message'] = 41;
        $response['message'] = $postresult['name'] . $postresult['email'] . $postresult['message'];
        return $response;
    }
}