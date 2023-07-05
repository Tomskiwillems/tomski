<?php

namespace tomski\_src\controllers;
use Exception;

class AjaxController extends BaseController implements \tomski\_src\interfaces\iController
{
    protected $request;

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

    private function getRequest(): array
    {
        $posted = ($_SERVER['REQUEST_METHOD'] === 'POST');
        return $this->request = ['func' => \tomski\_src\tools\Tools::getRequestVar('func', false)];
    }

//  =============================================

    private function performRequest()
    {
        $class = "\\tomski\_src\models\ajaxfunctions\\".$this->request['func'];
        if (class_exists($class))
        {
            $ajaxfunction = new $class;
            if ($ajaxfunction instanceof \tomski\_src\interfaces\iAjaxFunction)
            {
                $ajaxfunction->execute();
            }
            else
            {
                throw new Exception('Requested AjaxFunction '.$class.' is not an instance of iAjaxFunction.');
            }
        }
        else
        {
            throw new Exception('Requested AjaxFunction '.$class.' does not have an existing class.');
        }
    }
}