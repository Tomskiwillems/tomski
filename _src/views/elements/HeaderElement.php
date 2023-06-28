<?php

namespace tomski\_src\views\elements;

class HeaderElement extends ContainerElement
{
    protected function displayContent()
    {
        $content = '<header class="'.$this->elementinfo['class'].'">';
        $content .= $this->elements->show(false);
        $content .= '</header>';
        return $content;
    }
}