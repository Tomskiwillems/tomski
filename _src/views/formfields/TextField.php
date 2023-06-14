<?php

namespace tomski\_src\views\formfields;

class TextField extends BaseInputField
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct($fieldname, $fieldinfo)
    {
        parent::__construct($fieldname, $fieldinfo, "text");
    }
}