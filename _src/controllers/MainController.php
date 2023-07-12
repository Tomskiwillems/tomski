<?php

namespace tomski\_src\controllers;
use Exception;

class MainController extends BaseController
{
    protected $class;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function generateResponse()
    {
        $this->getRequest();
        $this->performRequest();
    }

//  =============================================

    protected function generateError($e)
    {
        header('HTTP/1.1 500 Internal Server Error');
        echo $e->getMessage();
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function getRequest()
    {
        $this->urlparams = explode('/', $_SERVER['REQUEST_URI']);
        $this->class = '\tomski\_src\controllers\\'.$this->urlparams[0].'Controller';
        if (class_exists($this->class))
        {
            array_shift($this->urlparams);
        }
        else
        {
            $this->class = '\tomski\_src\controllers\PageController';
        }
    }

//  =============================================

    private function performRequest()
    {
        $controller = new $this->class;
        if ($controller instanceof \tomski\_src\interfaces\iController)
        {
            $controller->handleRequest($this->urlparams);
        }
        else
        {
            //throw new Exception('Requested Controller '.$class.' is not an instance of iController.');
        }   
    }
}