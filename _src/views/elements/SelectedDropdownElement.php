<?php

namespace tomski\_src\views\elements;

class SelectedDropdownElement extends DropdownElement
{
    protected $selectedoption;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getSelectedOption(string $option)
    {
        $this->selectedoption = $option;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function displayContent()
    {
        $content = '<div class="'.$this->class.'">
        <div class="dropdown">
        <span class="dropdown-bar">'.$this->content[$this->selectedoption].'</span>
        <div class="dropdown-content">';
        unset($this->content[$this->selectedoption]);
        foreach ($this->content as $value => $name)
        {
            $content .= '<span value="'.$value.'">'.$name.'</span>';
        }
        $content .= '</div></div></div>';
        return $content;
    }
}