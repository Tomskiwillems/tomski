<?php

namespace tomski\_src\views\formfields;

class EmailInput extends BaseInputField
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct($fieldname, $fieldinfo)
    {
        parent::__construct($fieldname, $fieldinfo, "email");
    }

//  =============================================

    public function validate(): bool
    {
        $result = parent::validate();
        if ($result)
        {
            if (!$this->validateEmail())
            {
                $this->errormessage = 'Invalid e-mail format';
                $result = false;
            }
        }
        return $result;
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function validateEmail()
    {
        return filter_var($this->value, FILTER_VALIDATE_EMAIL);
    }
}