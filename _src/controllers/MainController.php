<?php

namespace tomski\_src\controllers;

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
        // NOG INVULLING AAN GEVEN!!!
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
            // ELSE TOEVOEGEN
        }
        // ELSE TOEVOEGEN
    }
}