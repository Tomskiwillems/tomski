<?php

namespace tomski\_src\factories;

class FormfieldFactory
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getFormfields($page, $language)
    {
        $formdatamodel = new \tomski\_src\data_access\datamodels\FormDatamodel;
        $forminfo = $formdatamodel->getFormfieldsByFormId($page, $language);
        if ($forminfo == false) return false;
        foreach ($forminfo as $fieldname => $fieldinfo)
        {
            $class = '\tomski\_src\views\formfields\\'.$fieldinfo['type'].'Field';
            $formfield = new $class($fieldname, $fieldinfo);
            $collection[$fieldname] = $formfield;
        }
        return $collection;
    }
}