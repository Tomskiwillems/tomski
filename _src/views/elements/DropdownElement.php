<?php

namespace tomski\_src\views\elements;

class DropdownElement extends BaseElement
{
    protected $content;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $optiondatamodel = new \tomski\_src\data_access\datamodels\OptionDatamodel();
        $this->content = $optiondatamodel->getOptionsByElementId($this->elementinfo['id']);
        if ($this->content == false) return false;
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        foreach ($this->content as $barname => $options)
        $content = '<div class="'.$this->elementinfo['class'].'">
        <span class="dropdown-button">'.$barname.'</span>
        <div class="dropdown-content">';
        foreach ($options as $value => $name)
        {
            $content .= '<span value="'.$value.'">'.$name.'</span>';
        }
        $content .= '</div></div>';
        return $content;
    }
}