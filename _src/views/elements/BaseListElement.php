<?php

namespace tomski\_src\views\elements;

abstract class BaseListElement extends BaseElement
{
    protected array $listitems;
    protected string $page;
    protected string $name;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $listitems, string $page, string $name='', $tree_order=0)
    {
        parent::__construct($tree_order);
		$this->listitems = $listitems;
        $this->page = $page;
        $this->name = $name;
	}

//  =============================================

    public function displayContent()
    {
        $output = '<ul id="list">';
        foreach ($this->listitems as $id => $value)
        {
            $output.= $this->addItem($id, $this->page, $value, $this->name);
        }
        $output.='</ul>';
        return $output;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    abstract protected function addItem(int $id, string $page, string $value, string $name);
}