<?php

namespace tomski\_src\views\formfields;

class BaseInputField extends BaseField
{
    protected $inputtype;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(string $fieldname, array $fieldinfo, string $language, string $inputtype)
    {
        parent::__construct($fieldname, $fieldinfo, $language);
        $this->inputtype = $inputtype;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function showField(): string
    {
        return '<input '
            . $this->getDefaultAttributes()
            . $this->getExtraAttributes()
            . ' />' . PHP_EOL;
    }

//  =============================================

    protected function getDefaultAttributes(): string
    {
        return 'name="' . $this->fieldname . '" type="' . $this->inputtype . '"';
    }

//  =============================================

    protected function getExtraAttributes(): string
    {
        return ' value="' . $this->getValue() . (isset($this->fieldinfo['placeholder'])
            ? '" placeholder ="' . $this->fieldinfo['placeholder'] . '"'
            : '"'
        );
    }
}