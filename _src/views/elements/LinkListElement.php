<?php

namespace tomski\_src\views\elements;

class LinkListElement extends BaseListElement
{

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function addItem(int $id, string $value, string $class)
    {
        return '<li><a class="'.$class.'" data-value="'.$value.'" data-id="'.$id.'">'.$value.'</a></li>';
    }
}