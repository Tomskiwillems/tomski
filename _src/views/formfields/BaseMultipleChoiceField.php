<?php

namespace tomski\_src\views\formfields;

abstract class BaseMultipleChoiceField extends BaseField implements \tomski\_src\interfaces\iMultipleChoiceField
{
    protected $options;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(string $fieldname, array $fieldinfo, string $language)
    {
        parent::__construct($fieldname, $fieldinfo, $language);
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
        return $this->showChoices();
    }

//  =============================================

    protected function showChoices(): string
    {
        $content = '';
        foreach ($this->options as $name => $value)
        {
            $content .= $this->showChoice($name, $value);
        }
        return $content;
    }

//  =============================================

    abstract protected function showChoice($name, $value);
}