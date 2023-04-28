<?php

namespace tomski\_src\models\validates;

abstract class BaseValidate
{
    protected $postresult;
    protected $response;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $postresult, array $response)
    {
        $this->postresult = $postresult;
        $this->response = $response;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================  

    abstract protected function validate();
}