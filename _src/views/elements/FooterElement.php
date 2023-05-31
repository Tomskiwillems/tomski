<?php

namespace tomski\_src\views\elements;

class FooterElement extends BaseElement
{
    protected function displayContent()
    {
        $content = '<div class="'.$this->class.'"><footer>&copy; 2023';
        if (date("Y") > 2023) $content .= ' - '.date("Y");
        $content .= ' Tom Willems</footer></div>';
        return $content;
    }
}