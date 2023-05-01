<?php

namespace tomski\_src\controllers;
use Exception;

abstract class BaseController
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function handleRequest()
    {
        try
        {
            ob_start();
            $this->generateResponse();
            ob_end_flush();
        }
        catch (Exception $e)
        {
            ob_end_clean();
            $this->generateError($e);   
        }
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    abstract protected function generateResponse();

//  =============================================

    abstract protected function generateError($e);

}