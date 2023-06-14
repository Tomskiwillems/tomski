<?php

namespace tomski\_src\views\elements;

class LanguageDropdownElement extends SelectedDropdownElement
{

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $optiondatamodel = new \tomski\_src\data_access\datamodels\OptionDatamodel();
        $this->content = $optiondatamodel->getLanguageOptions();
        if ($this->content == false) return false;
        $this->getSelectedOption();
        return true;
    }

//  =============================================

    protected function getSelectedOption()
    {
        foreach ($this->content as $id => $name)
        {
            if ($id == $this->language)
            {
                $this->selectedoption = $name;
                unset($this->content[$id]);
            }
        }
    }
}