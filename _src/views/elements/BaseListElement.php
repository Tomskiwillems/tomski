<?php

namespace tomski\_src\views\elements;

abstract class BaseListElement extends BaseElement
{
    protected array $listitems;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $databaseinfo = new \tomski\_src\data_access\DatabaseInfo;
        $this->listitems = $databaseinfo->getListItemsByID($this->elementinfo['id']);
        if ($this->listitems == false) return false;
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        $content = '<div class="'.$this->elementinfo['class'].'"><ul>';
        foreach ($this->listitems as $value => $name)
        {
            $content.= $this->addItem($value, $name);
        }
        $content.='</ul></div>';
        return $content;
    }

//  =============================================

    abstract protected function addItem(string $value, string $name);
}