<?php

namespace tomski\_src\factories;

class FormfieldFactory
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getFormfields($page)
    {
        $databaseinfo = new \tomski\_src\data_access\DatabaseInfo;
        $forminfo = $databaseinfo->getForminfoByPage($page);
        if ($forminfo == false) return false;
        foreach ($forminfo as $fieldname => $fieldinfo)
        {
            switch ($fieldinfo['type'])
            {
                case "checkbox":
                    $class = new \tomski\_src\views\formfields\CheckboxField($fieldname, $fieldinfo);
                    break;
                case "dropdown":
                    $class = new \tomski\_src\views\formfields\DropdownField($fieldname, $fieldinfo);
                    break;
                case "email":
                    $class = new \tomski\_src\views\formfields\EmailInput($fieldname, $fieldinfo);
                    break;
                case "newpassword":
                    $class = new \tomski\_src\views\formfields\NewPasswordInput($fieldname, $fieldinfo);
                    break;
                case "password":
                    $class = new \tomski\_src\views\formfields\PasswordInput($fieldname, $fieldinfo);
                    break;
                case "textarea":
                    $class = new \tomski\_src\views\formfields\TextareaInput($fieldname, $fieldinfo);
                    break;
                default:
                    $class = new \tomski\_src\views\formfields\TextInput($fieldname, $fieldinfo);
                    break;
            }
            $collection[$fieldname] = $class;
        }
        return $collection;
    }
}