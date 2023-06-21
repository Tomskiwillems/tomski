<?php

namespace tomski\_src\views\elements;

class SelectedDropdownElement extends DropdownElement
{
    protected $selectedoption;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $optiondatamodel = new \tomski\_src\data_access\datamodels\OptionDatamodel();
        $this->content = $optiondatamodel->getOptionsByElementId($this->elementinfo['id']);
        if ($this->content == false) return false;
        $this->getSelectedOption();
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        $content = '<div class="'.$this->elementinfo['class'].'">
        <span class="dropdown-button">'.$this->selectedoption.'</span>
        <div class="dropdown-content">';
        foreach ($this->content as $value => $name)
        {
            $content .= '<span class="dropdown-option" value="'.$value.'">'.$name.'</span>';
        }
        $content .= '</div></div>';
        return $content;
    }

//  =============================================

    protected function getSelectedOption()
    {
        foreach ($this->content as $option)
        {
            if ($option['selectedoption'])
            {
                $this->selectedoption = $option['name'];
                unset($option);
            }
        }
    }
}