<?php

namespace tomski\_src\views\elements;

abstract class BaseListElement extends BaseElement
{
    protected array $listitems;
    protected string $class;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $listitems, string $class, int $tree_order=0)
    {
        parent::__construct($tree_order);
		$this->listitems = $listitems;
        $this->class = $class;
	}

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function displayContent()
    {
        $content = '<ul id="list">';
        foreach ($this->listitems as $id => $value)
        {
            $content.= $this->addItem($id, $value, $this->class);
        }
        $content.='</ul>';
        return $content;
    }

//  =============================================

    abstract protected function addItem(int $id, string $value, string $class);
}