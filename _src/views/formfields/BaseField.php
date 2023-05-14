<?php

namespace tomski\_src\views\formfields;

abstract class BaseField implements \tomski\_src\interfaces\iFormField, \tomski\_src\interfaces\iFormValidate
{
    protected $output = '';
    protected $fieldname;
    protected $fieldinfo;
    protected $errormessage;
    protected $value;
    protected $default = '';

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(string $fieldname, array $fieldinfo)
    {
        $this->fieldname = $fieldname;
        $this->fieldinfo = $fieldinfo;
        if (isset($this->fieldinfo['default'])) $this->default = $this->fieldinfo['default'];
    }

//  =============================================

    public function show(): string
    {
        if (isset($this->fieldinfo['label'])) $this->output .= $this->showLabel();
        $this->output .= $this->showField();
        if (isset($this->errormessage)) $this->output .= $this->showError();
        return $this->output;
    }

//  =============================================

    public function validate(): bool
    {
        $result = false;
        if (isset($_POST[$this->fieldname]))
        {
            $this->value = $_POST[$this->fieldname];
        }
        if (is_null($this->value)) // Not found
        {
            $this->errormessage = $this->fieldname . ' not found.';
        }
        elseif ($this->value === false) // Filter failed
        {
            $this->errormessage = $this->fieldname . ' is invalid.';
        }
        else
        {
            if(is_string($this->value)) $this->value = trim($this->value);
            if (empty($this->value) && $this->fieldinfo['optional'] === false)
            {
                $this->errormessage = $this->fieldname . ' is empty.';
            }
            else
            {
                $result = true;
            }
        }
        return $result;
    }

//  =============================================

    public function getValue(): mixed
    {
        return $this->value ? $this->value : $this->default;
    }

//  =============================================

    public function setValue($value)
    {
        $this->value = $value;
    }

//  =============================================

    public function getFieldname(): string
    {
        return $this->fieldname;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function showLabel(): string
    {
        return '<label class="form_label" for="' . $this->fieldname . '">' . $this->fieldinfo['label'] . '</label>' . PHP_EOL;
    }

//  =============================================

    protected function showError(): string
    {
        return '<span class="error">* ' . $this->errormessage . '</span><br/>' . PHP_EOL;
    }

//  =============================================

    abstract protected function showField(): string;
}