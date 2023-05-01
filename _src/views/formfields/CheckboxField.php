<?php

namespace tomski\_src\views\formfields;

class CheckboxField extends BaseMultipleChoiceField
{
    protected $checked = '';

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(string $fieldname, array $fieldinfo)
    {
        parent::__construct($fieldname, $fieldinfo);
        $this->value = [];
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function showChoice($name, $value)
    {
        if(is_array($this->value))
        {
            if (count($this->value) > 0)
            {
                foreach($this->value as $keyvalue)
                {
                    $this->checked = '';
                    if($name == $keyvalue)
                    {
                        $this->checked = 'checked';
                        break;
                    }
                }
            }
        }
        return '<label class="checkbox_list"><input id="checkbox' . $name . '" type="checkbox" name="' . $this->fieldname . '[]"
            value="' . $name . '"' . $this->checked . '>' . $value . '</label>';
    }
}