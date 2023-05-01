<?php

namespace tomski\_src\controllers;

class AjaxController extends BaseController
{
    protected $request;

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
        header('HTTP/1.1 500 Internal Server Error');
        echo $e->getMessage();
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
        $class = "\\tomski\_src\models\ajaxfunctions\\".$this->request['func'];
        $ajaxfunction = new $class;
        $ajaxfunction->execute();
    }
}