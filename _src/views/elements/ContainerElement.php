<?php

namespace tomski\_src\views\elements;

class ContainerElement extends BaseElement implements \tomski\_src\interfaces\iContainerElement
{
    protected $elements;
    protected $containerelements;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function setContainerElements(array $containerelements)
    {
        $this->containerelements = $containerelements;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        foreach ($this->containerelements as $element)
        {
            $this->addElement($element);
        }
        return isset($this->elements);
    }

//  =============================================

    protected function displayContent()
    {
        $content = '<div class="'.$this->elementinfo['class'].'">';
        $content .= $this->elements->show(false);
        $content .= '</div>';
        return $content;
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================  

    private function addElement($element)
	{
		if (isset($this->elements)) $this->elements->insert($element);
		else $this->elements = $element;
	}
}