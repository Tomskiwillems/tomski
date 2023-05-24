<?php

namespace tomski\_src\views\elements;

class MenuListElement extends LinkListElement
{

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $pagedatamodel = new \tomski\_src\data_access\datamodels\PageDatamodel;
        $parentid = $pagedatamodel->getParentID($this->id);
        if ($parentid === false) return false;
        if ($parentid === '0' && $this->class != 'mainmenu') $this->listitems = $pagedatamodel->getMenuItems($this->id, $this->language);
        else $this->listitems = $pagedatamodel->getMenuItems($parentid, $this->language);
        if ($this->listitems == false) return false;
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        $content = '<span class="'.$this->class.'"><ul>';
        foreach ($this->listitems as $value => $name)
        {
            $content .= $this->addItem($value, $name);
        }
        $content .= '</ul></span>';
        return $content;
    }
}