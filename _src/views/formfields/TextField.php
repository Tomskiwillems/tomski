<?php

namespace tomski\_src\views\formfields;

class TextField extends BaseInputField
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(string $fieldname, array $fieldinfo, string $language)
    {
        parent::__construct($fieldname, $fieldinfo, $language, "text");
    }
}