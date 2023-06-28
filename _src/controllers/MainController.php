<?php

namespace tomski\_src\controllers;
use Exception;

class MainController extends BaseController
{
    protected $action;

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
        isset($_GET["action"])
        ? $this->action = $_GET["action"]
        : $this->action = "Page";
    }

//  =============================================

    private function performRequest()
    {
        $class = '\tomski\_src\controllers\\'.$this->action.'Controller';
        if (class_exists($class))
        {
            $controller = new $class;
            if ($controller instanceof \tomski\_src\interfaces\iController)
            {
                $controller->handleRequest();
            }
            else
            {
                throw new Exception('Requested Controller '.$class.' is not an instance of iController.');
            }   
        }
        else
        {
            throw new Exception('Requested Controller '.$class.' is not an existing class.');
        }
    }
}