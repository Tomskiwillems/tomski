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
        if ($parentid === '0' && $this->class != 'mainmenulist') $this->listitems = $pagedatamodel->getMenuItems($this->id, $this->language);
        else $this->listitems = $pagedatamodel->getMenuItems($parentid, $this->language);
        if ($this->listitems == false) return false;
        return true;
    }
}