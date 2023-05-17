<?php

namespace tomski\_src\factories;

class ElementFactory
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getTextElement(string $text, string $class, int $order)
    {
        return new \tomski\_src\views\elements\TextElement($text, $class, $order);
    }

    public function getFormElement(string $page, string $class, int $order)
    {
        return new \tomski\_src\views\elements\FormElement($page, $class, $order);
    }
          
    public function getLinklistElement(string $listname, string $class, int $order)
    {
        return new \tomski\_src\views\elements\LinklistElement($listname, $class, $order);
    }

    public function getFooterElement(string $class, int $order)
    {
        return new \tomski\_src\views\elements\FooterElement($class, $order);
    }
}