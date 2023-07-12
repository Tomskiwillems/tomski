<?php

namespace tomski\_src\models\ajaxfunctions;

abstract class BaseAjaxFunction implements \tomski\_src\interfaces\iAjaxFunction
{
    protected $data;
    protected $urlparams;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function execute(array $urlparams) : bool
    {
        $this->urlparams = $urlparams;
        if ($this->getData()) if ($this->sendData()) return true;
        return false;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================
    
    protected function sendData()
    {
        $this->data = json_encode($this->data);
        if ($this->data == false) return false;
        header("Content-type: application/json");
        echo $this->data;
        return true;
    }

//  =============================================

    abstract protected function getData() : bool;
}