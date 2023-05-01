<?php

namespace tomski\_src\views\formfields;

class PasswordInput extends BaseInputField
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct($fieldname, $fieldinfo)
    {
        parent::__construct($fieldname, $fieldinfo, "password");
    }

//  =============================================

    public function validate(): bool
    {
        $result = parent::validate();
        if ($result)
        {
            if (!$this->validatePassword())
            {
                $this->errormessage = 'passwords need to contain at least 8 characters with at least 1 uppercase, 1 lowercase and 1 number.';
                $result = false;
            }
        }
        return $result;
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function validatePassword()
    {
        return preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $this->value);
    }
}