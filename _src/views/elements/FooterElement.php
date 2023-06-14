<?php

namespace tomski\_src\views\elements;

class FooterElement extends ContainerElement
{
    protected function displayContent()
    {
        $content = '<div class="'.$this->elementinfo['class'].'"><footer>';
        $content .= $this->elements->show(false);
        $content .= '</footer></div>';
        return $content;
    }
}