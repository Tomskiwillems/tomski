<?php

namespace tomski\_src\views\elements;

class HtmlDocument
{
    protected $elements;

//  =============================================
//  PUBLIC METHODS
//  =============================================
    
    public function __construct(object $elements)
    {
        $this->elements = $elements;
    }

//  =============================================

    public function show()
    {
        $this->beginDoc();
        $this->beginHeader();
        $this->headerContent();
        $this->endHeader();
        $this->beginBody();
        $this->bodyContent();
        $this->endBody();
        $this->endDoc();
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function beginDoc()
    {
        echo '<!DOCTYPE html><html>';
    }

//  =============================================

    protected function beginHeader()
    {
        echo '<head>';
    }

//  =============================================
    
    protected function headerContent()
    {
        echo '<title>Tomski</title>
        <link rel="stylesheet" href="assets/stylesheets/stylesheet.css">';
    }

//  =============================================

    protected function endHeader()
    {
        echo '</head>';
    }

//  =============================================

    protected function beginBody()
    {
        echo '<body>';
    }

//  =============================================

    protected function bodyContent()
    {
        $this->showContent();
        $this->showScripts();
    }

//  =============================================

    protected function showContent()
    {
        $this->elements->show(true);
    }

//  =============================================

    protected function showScripts()
    {
        echo '<script src="assets/scripts/javascript.js"></script>';
    }

//  =============================================

    protected function endBody()
    {
        echo '</body>';
    }

//  =============================================

    protected function endDoc()
    {
        echo '</html>';
    }
}