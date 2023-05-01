<?php

namespace tomski\_src\views\formfields;

class NewPasswordInput extends PasswordInput
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function show(): string
    {
        $this->output .= $this->showLabel();
        $this->output .= $this->showField();
        if (isset($this->errormessage)) $this->output .= $this->showError();

        $this->fieldinfo['label'] = "Repeat " . strtolower($this->fieldinfo['label']);
        $this->fieldname = "repeat_" . $this->fieldname;

        $this->output .= $this->showLabel();
        $this->output .= $this->showField();
        if (isset($this->errormessage)) $this->output .= $this->showError();
        return $this->output;
    }

//  =============================================

    public function validate(): bool
    {
        $result = parent::validate();
        $repeatpassword = $_POST["repeat_" . $this->fieldname];
        if ($this->value != $repeatpassword)
        {
            $this->errormessage = 'Passwords do not match';
            $result = false;
        }
        return $result;
    }
}