<?php

namespace tomski\_src\views\elements;

class TextElement extends BaseElement
{
	protected $id;
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
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $textdatamodel = new \tomski\_src\data_access\datamodels\TextDatamodel;
        $this->content = $textdatamodel->getTextByID($this->id, $this->language);
        if ($this->content == false) return false;
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        return '<div class="'.$this->class.'">'.$this->content.'</div>';
    }
}