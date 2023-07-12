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

    protected function displayContent()
    {
        $content = '<div class="'.$this->elementinfo['class'].'">
        <div class="dropdown-button">
        <img class="dropdown-languageflag" src="/assets/images/languageflags/'.$this->selectedoption.'.png" width="40px" height="30px">
        <span class="dropdown-languagecode"> '.$this->selectedoption.'</span>
        <img  class="dropdown-image" src="/assets/images/icons/dropdown.png" width="20px" height="20px"></div>
        <div class="dropdown-content">';
        foreach ($this->content as $value => $name)
        {
            $content .= '<div class="dropdown-option" value="'.$value.'">
            <img class="dropdown-languageflag" src="/assets/images/languageflags/'.$value.'.png" width="40px" height="30px">
            <span class="dropdown-languagecode">'.$value.'</span></div>';
        }
        $content .= '</div></div>';
        return $content;
    }

//  =============================================

    protected function getSelectedOption()
    {
        foreach ($this->content as $id => $name)
        {
            if ($id == $this->language)
            {
                $this->selectedoption = $id;
                unset($this->content[$id]);
            }
        }
    }
}