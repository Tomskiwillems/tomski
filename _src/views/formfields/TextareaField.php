<?php

namespace tomski\_src\views\formfields;

class TextareaField extends BaseField
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function showField(): string
    {
        return '<textarea name="' . $this->fieldname . '" placeholder="' . $this->fieldinfo['placeholder'] . '">'
            . (isset($this->value) ? $this->value : '') . '</textarea>' . PHP_EOL;
    }
}