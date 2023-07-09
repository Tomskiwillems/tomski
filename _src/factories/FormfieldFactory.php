<?php

namespace tomski\_src\factories;

class FormFieldFactory
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getFormfields($formid)
    {
        $formdatamodel = new \tomski\_src\data_access\datamodels\FormDatamodel;
        $forminfo = $formdatamodel->getFormfieldsByFormId($formid, $_SESSION['language']);
        if ($forminfo == false) return false;
        foreach ($forminfo as $fieldname => $fieldinfo)
        {
            $class = '\tomski\_src\views\formfields\\'.$fieldinfo['type'].'Field';
            $formfield = new $class($fieldname, $fieldinfo, $_SESSION['language']);
            $collection[$fieldname] = $formfield;
        }
        return $collection;
    }
}