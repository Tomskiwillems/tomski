<?php

namespace tomski\_src\controllers;
use Exception;

class MainController
{
    protected $action;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function handleRequest()
    {
        $this->getAction();
        $this->performAction();
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function getAction()
    {
        isset($_GET["action"])
        ? $this->action = $_GET["action"]
        : $this->action = "Page";
    }

//  =============================================

    private function performAction()
    {
        try
        {
            ob_start();
            $class = "\\tomski\_src\controllers\\".$this->action."Controller";
            $controller = new $class;
            $controller->handleRequest();
            ob_end_flush();
        }
        catch (Exception $e)
        {
            ob_end_clean();
            header('HTTP/1.1 500 Internal Server Error');
            echo $e->getMessage();
        }
    }
}