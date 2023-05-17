<?php

namespace tomski\_src\views\elements;

class LinkListElement extends BaseListElement
{

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function addItem(string $value, string $name)
    {
        return '<li><a data-id="'.$value.'">'.$name.'</a></li>';
    }
}