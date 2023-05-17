<?php

namespace tomski\_src\views\elements;

class TextElement extends BaseElement
{
	protected $textid;
    protected $class;
    protected $content;

//  =============================================
//  PUBLIC METHODS
//  =============================================

	public function __construct(int $textid, string $class, int $tree_order=0)
    {
        parent::__construct($class, $tree_order);
		$this->textid = $textid;
	}

//  =============================================

    public function getContent()
    {
        $databaseinfo = new \tomski\_src\data_access\DatabaseInfo;
        $this->content = $databaseinfo->getTextByID($this->textid);
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