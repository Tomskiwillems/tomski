<?php

namespace tomski\_src\views\formfields;

class DropdownField extends BaseMultipleChoiceField
{

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function showField() : string
    {
        $dropdown = '<select id="dropdown" name="dropdown">';
        foreach($this->options as $name => $value)
        {
            $dropdown .= $this->showChoice($name, $value);
        }
        $dropdown .= '</select>';
        return $dropdown;
    }

//  =============================================

    protected function showChoice($name, $value)
    {
        return '<option value="' . $value . '">' . $value . '</option>';
    }
}