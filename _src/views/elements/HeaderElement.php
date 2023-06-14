<?php

namespace tomski\_src\views\elements;

class HeaderElement extends TextElement
{

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $pagedatamodel = new \tomski\_src\data_access\datamodels\PageDatamodel;
        $parentid = $pagedatamodel->getParentID($this->response['page']);
        if ($parentid === '0')
        {
            if ($this->elementinfo['class'] === 'mainheader')
            {
                $pagename = $pagedatamodel->getPageName($this->response['page'], $this->language);
                if ($pagename === false) return false;
                $this->content = '<h1>'.$pagename.'</h1>';
            }
            else
            {
                $menuitems = $pagedatamodel->getMenuItems($this->response['page'], $this->language);
                if ($menuitems === false) return false;
                $this->content = '<h2>'.array_shift($menuitems).'</h2>';
            }
        }
        else
        {
            if ($parentid === false) return false;
            if ($this->elementinfo['class'] === 'mainheader')
            {
                $pagename = $pagedatamodel->getPageName($parentid, $this->language);
                if ($pagename === false) return false;
                $this->content = '<h1>'.$pagename.'</h1>';
            }
            else
            {
                $pagename = $pagedatamodel->getPageName($this->response['page'], $this->language);
                if ($pagename === false) return false;
                $this->content = '<h2>'.$pagename.'</h2>';
            }
        }
        return true;
    }
}