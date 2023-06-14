<?php

namespace tomski\_src\views\elements;

class TextElement extends BaseElement
{
    protected $content;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $textdatamodel = new \tomski\_src\data_access\datamodels\TextDatamodel;
        $this->content = $textdatamodel->getTextByElementID($this->elementinfo['id'], $this->language);
        if ($this->content == false) return false;
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        return '<div class="'.$this->elementinfo['class'].'">'.$this->content.'</div>';
    }
}