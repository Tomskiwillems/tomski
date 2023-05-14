<?php

namespace tomski\_src\views\elements;

class TextElement extends BaseElement
{
	protected $content;

//  =============================================
//  PUBLIC METHODS
//  =============================================

	public function __construct(string $content, int $tree_order=0)
    {
        parent::__construct($tree_order);
		$this->content = $content;
	}

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function displayContent()
    {
        return $this->content;
    }
}