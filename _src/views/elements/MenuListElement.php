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
        $parentid = $pagedatamodel->getParentID($this->response['page']);
        if ($parentid === false) return false;
        if ($this->elementinfo['class'] == 'mainmenulist')
        {
            $this->listitems = $pagedatamodel->getMenuItems(0, $this->language);
        }
        elseif ($parentid === '0')
        {
            $this->listitems = $pagedatamodel->getMenuItems($this->response['page'], $this->language);
        }
        else
        {
            $this->listitems = $pagedatamodel->getMenuItems($parentid, $this->language);
        }
        if ($this->listitems == false) return false;
        return true;
    }

//  =============================================

    protected function addItem(string $value, string $name)
    {
        return '<li><a class="menu-item" data-id="'.$value.'">'.$name.'</a></li>';
    }
}