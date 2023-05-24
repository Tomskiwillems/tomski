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
                $this->errormessage = 15;
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