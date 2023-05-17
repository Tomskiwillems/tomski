<?php

namespace tomski\_src\views\elements;

class FooterElement extends BaseElement
{
    protected function displayContent()
    {
        $content = '<span class="'.$this->class.'"><footer>&copy; 2023';
        if (date("Y") > 2023) $content .= ' - '.date("Y");
        $content .= ' Tom Willems</footer></span>';
        return $content;
    }
}