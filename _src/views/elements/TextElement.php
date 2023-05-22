<?php

namespace tomski\_src\views\elements;

class TextElement extends BaseElement
{
	protected $id;
    protected $class;
    protected $content;

//  =============================================
//  PUBLIC METHODS
//  =============================================

	public function __construct(int $id, string $class, string $language, int $tree_order=0)
    {
        parent::__construct($class, $language, $tree_order);
		$this->id = $id;
	}

//  =============================================

    public function getContent()
    {
        $databaseinfo = new \tomski\_src\data_access\DatabaseInfo;
        $this->content = $databaseinfo->getTextByID($this->id);
        if ($this->content == false) return false;
        return true;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function displayContent()
    {
        return '<span class="'.$this->class.'">'.$this->content.'</span>';
    }
}