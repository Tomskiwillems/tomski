<?php

namespace tomski\_src\models\validates;;
class ValidateFormFields
{
    protected $fieldcollection;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $fieldcollection)
    {
        $this->fieldcollection = $fieldcollection;
    }

//  =============================================

    public function getPostresult()
    {
        $postresult = [];
        foreach ($this->fieldcollection as $fieldobject)
        {
            if ($fieldobject instanceof \Wiki\formfields\BaseField)
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
        foreach ($this->fieldcollection as $fieldobject)
        {
            if (!$fieldobject instanceof \Wiki\interfaces\iValidator || !$fieldobject->validate())
            {    
                $result = false;
            }
        }
        return $result;
    }
}