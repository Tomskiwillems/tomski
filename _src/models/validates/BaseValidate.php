<?php

namespace tomski\_src\models\validates;

abstract class BaseValidate
{

//  =============================================
//  PROTECTED METHODS
//  =============================================  

    abstract protected function validate(array $postresult, array $response);
}