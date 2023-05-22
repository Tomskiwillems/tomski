<?php

namespace tomski\_src\views\elements;

class HeaderElement extends TextElement
{

//  =============================================
//  PROTECTED METHODS
//  =============================================

    public function getContent()
    {
        $pagedatamodel = new \tomski\_src\data_access\datamodels\PageDatamodel;
        $parentid = $pagedatamodel->getParentID($this->id);
        if ($parentid === '0')
        {
            if ($this->class === 'mainheader')
            {
                $pagename = $pagedatamodel->getPageName($this->id, $this->language);
                if ($pagename === false) return false;
                $this->content = '<h1>'.$pagename.'</h1>';
            }
            else
            {
                $menuitems = $pagedatamodel->getMenuItems($this->id, $this->language);
                if ($menuitems === false) return false;
                $this->content = '<h2>'.array_shift($menuitems).'</h2>';
            }
        }
        else
        {
            if ($parentid === false) return false;
            if ($this->class === 'mainheader')
            {
                $pagename = $pagedatamodel->getPageName($parentid, $this->language);
                if ($pagename === false) return false;
                $this->content = '<h1>'.$pagename.'</h1>';
            }
            else
            {
                $pagename = $pagedatamodel->getPageName($this->id, $this->language);
                if ($pagename === false) return false;
                $this->content = '<h2>'.$pagename.'</h2>';
            }
        }
        return true;
    }
}