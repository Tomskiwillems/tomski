<?php

namespace tomski\_src\views\formfields;

class DropdownField extends BaseMultipleChoiceField
{

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function showField() : string
    {
        $content = '<select>';
        $content .= $this->showChoices();
        $content .= '</select>';
        return $content;
    }

//  =============================================

    protected function showChoice($name, $value)
    {
        return '<option value="' . $value . '">' . $name . '</option>';
    }
}