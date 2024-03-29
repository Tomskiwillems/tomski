<?php

namespace tomski\_src\views\formfields;

class EmailField extends BaseInputField
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(string $fieldname, array $fieldinfo, string $language)
    {
        parent::__construct($fieldname, $fieldinfo, $language, "email");
    }

//  =============================================

    public function validate(): bool
    {
        $result = parent::validate();
        if ($result)
        {
            if (!$this->validateEmail())
            {
                $this->errormessage = 13;
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