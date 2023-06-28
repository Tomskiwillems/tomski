<?php

namespace tomski\_src\views\elements;

class FooterElement extends ContainerElement
{
    protected function displayContent()
    {
        $content = '<footer class="'.$this->elementinfo['class'].'">';
        $content .= $this->elements->show(false);
        $content .= '</footer>';
        return $content;
    }
}