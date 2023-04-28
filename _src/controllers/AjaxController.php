<?php

namespace tomski\_src\controllers;
use Exception;

class AjaxController
{
    protected $request;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function handleRequest()
    {
        $this->getRequest();
        $this->performRequest();
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function getRequest(): array
    {
        $posted = ($_SERVER['REQUEST_METHOD'] === 'POST');
        return $this->request = [   'posted' => $posted,
                                    'func' => \tomski\_src\tools\Tools::getRequestVar('func', false)];
    }

//  =============================================

    private function performRequest()
    {
        try
        {
            ob_start();
            $class = "\\tomski\_src\models\ajaxfunctions\\".$this->request['func'];
            $ajaxfunction = new $class;
            $ajaxfunction->execute();
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