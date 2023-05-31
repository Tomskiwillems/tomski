<?php

namespace tomski\_src\views\elements;

class ContainerElement extends BaseElement
{
    protected $elements;

//  =============================================
//  PUBLIC METHODS
//  =============================================
    
    public function __construct(object $elements, string $class, string $language, int $tree_order=0)
    {
        parent::__construct($class, $language, $tree_order);
        $this->elements = $elements;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function displayContent()
    {
        $content = '<div class="'.$this->class.'">';
        $content .= $this->elements->show(false);
        $content .= '</div>';
        return $content;
    }
}