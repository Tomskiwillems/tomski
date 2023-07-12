<?php

namespace tomski\_src\controllers;
use Exception;

class AjaxController extends BaseController implements \tomski\_src\interfaces\iController
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
        $this->class = "\\tomski\_src\models\ajaxfunctions\\".$this->urlparams[0];
        if (class_exists($this->class))
        {
            array_shift($this->urlparams);
        }
        else
        {
            $this->class = "\\tomski\_src\models\ajaxfunctions\NewPage";
        }
    }

//  =============================================

    private function performRequest()
    {
        $ajaxfunction = new $this->class;
        if ($ajaxfunction instanceof \tomski\_src\interfaces\iAjaxFunction)
        {
            $ajaxfunction->execute($this->urlparams);
        }
        else
        {
            throw new Exception('Requested AjaxFunction '.$this->class.' is not an instance of iAjaxFunction.');
        }
    }
}