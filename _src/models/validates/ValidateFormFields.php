<?php

namespace tomski\_src\models\validates;

class ValidateFormFields
{
    protected $formfields;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $formfields)
    {
        $this->formfields = $formfields;
    }

//  =============================================

    public function getPostresult()
    {
        $postresult = [];
        foreach ($this->formfields as $fieldobject)
        {
            if ($fieldobject instanceof \tomski\_src\views\formfields\BaseField)
            {    
                $postresult[$fieldobject->getFieldname()] = $fieldobject->getValue();
            } 
        }
        return $postresult;
    }

//  =============================================

    public function validateFields(): bool
    {
        $result = true;
        foreach ($this->formfields as $fieldobject)
        {
            if (!$fieldobject instanceof \tomski\_src\interfaces\iFormValidate || !$fieldobject->validate())
            {    
                $result = false;
            }
        }
        return $result;
    }
}