<?php

namespace tomski\_src\factories;

class ElementFactory
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getContainerElement(object $elements, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\ContainerElement($elements, $class, $language, $order);
    }

//  =============================================

    public function getDropdownElement(int $id, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\DropdownElement($id, $class, $language, $order);
    }

//  =============================================

    public function getFooterElement(string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\FooterElement($class, $language, $order);
    }

//  =============================================

    public function getFormElement(int $page, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\FormElement($page, $class, $language, $order);
    }

//  =============================================

    public function getHeaderElement(int $page, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\HeaderElement($page, $class, $language, $order);
    }

//  =============================================
          
    public function getLinklistElement(int $id, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\LinklistElement($id, $class, $language, $order);
    }

//  =============================================

    public function getMainMenuElement(int $page, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\MainMenuElement($page, $class, $language, $order);
    }

//  =============================================

    public function getMenuListElement(int $page, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\MenuListElement($page, $class, $language, $order);
    }

//  =============================================

    public function getSelectedDropdownElement(int $id, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\SelectedDropdownElement($id, $class, $language, $order);
    }

//  =============================================

    public function getTextElement(int $id, string $class, string $language, int $order)
    {
        return new \tomski\_src\views\elements\TextElement($id, $class, $language, $order);
    }
}