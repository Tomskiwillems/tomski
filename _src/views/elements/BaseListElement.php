<?php

namespace tomski\_src\views\elements;

abstract class BaseListElement extends BaseElement
{
    protected string $id;
    protected array $listitems;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(int $id, string $class, string $language, int $tree_order=0)
    {
        parent::__construct($class, $language, $tree_order);
		$this->id = $id;
	}

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $databaseinfo = new \tomski\_src\data_access\DatabaseInfo;
        $this->listitems = $databaseinfo->getListItemsByID($this->id);
        if ($this->listitems == false) return false;
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        $this->getContent();
        $content = '<span class="'.$this->class.'"><ul>';
        foreach ($this->listitems as $value => $name)
        {
            $content.= $this->addItem($value, $name);
        }
        $content.='</ul></span>';
        return $content;
    }

//  =============================================

    abstract protected function addItem(string $value, string $name);
}