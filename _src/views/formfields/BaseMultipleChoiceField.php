<?php

namespace tomski\_src\views\formfields;

abstract class BaseMultipleChoiceField extends BaseField implements \tomski\_src\interfaces\iMultipleChoiceField
{
    protected $options;
    protected $field = '';

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(string $fieldname, array $fieldinfo)
    {
        parent::__construct($fieldname, $fieldinfo);
    }

//  =============================================

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function showField(): string
    {
        foreach ($this->options as $name => $value)
        {
            $this->field .= $this->showChoice($name, $value);
        }
        return $this->field;
    }

//  =============================================

    abstract protected function showChoice($name, $value);
}