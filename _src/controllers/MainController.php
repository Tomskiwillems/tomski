<?php

namespace tomski\_src\controllers;

class MainController extends BaseController
{
    protected $action;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function generateResponse()
    {
        $this->getRequest();
        $this->performRequest();
    }

//  =============================================

    public function generateError($e)
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
        $class = "\\tomski\_src\controllers\\".$this->action."Controller";
        $controller = new $class;
        $controller->handleRequest();
    }
}