<?php

namespace tomski\_src\views\elements;

abstract class BaseElement implements \tomski\_src\interfaces\iElement
{
    protected $left_child;
    protected $right_child;
    protected $elementinfo;
    protected $response;
    protected $language;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $elementinfo, array $response, string $language)
    {
        $this->elementinfo = $elementinfo;
        $this->response = $response;
        $this->language = $language;
    }

//  =============================================

    public function insert($element)
    {
        if($this->_compareTo($element)>0)
        {
            isset($this->left_child) ? $this->left_child->insert($element) : $this->left_child = $element;
        }
        else
        {
            isset($this->right_child) ? $this->right_child->insert($element) : $this->right_child = $element;
        }
    }

//  =============================================

    public function show(bool $direct_output)
    {
        $output = '';
        if (isset($this->left_child))
        {
            $output .= $this->left_child->show($direct_output);
        }
        if ($direct_output)
        {
            if ($this->getContent())
            {
                echo $this->displayContent();
            }
            else
            {
                // FOUT OPVANGEN
            }
        }
        else
        {
            if ($this->getContent())
            {
                $output .= $this->displayContent();
            }
            else
            {
                // FOUT OPVANGEN
            }
        } 
        if (isset($this->right_child))
        {
            $output .= $this->right_child->show($direct_output);
        }
        return $output;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function _compareTo($element) : int
    {
        return ( $this->elementinfo['tree_order'] <=> $element->getOrder() );
    }

//  =============================================

    protected function getOrder()
    {
        return $this->elementinfo['tree_order'];
    }

//  =============================================

    protected function getContent()
    {
        return true;
    }

//  =============================================

    abstract protected function displayContent();
}