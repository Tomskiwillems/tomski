<?php

namespace tomski\_src\views\elements;

class HtmlDocument
{
    protected $elements;
    
    public function __construct(object $elements)
    {
        $this->elements = $elements;
    }

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

    // abstract protected function showPage();

    protected function beginDoc()
    {
        echo '<!DOCTYPE html><html>';
    }

    protected function beginHeader()
    {
        echo '<head>';
    }
    
    protected function headerContent()
    {
        echo '<title>Tomski</title>
        <link rel="stylesheet" href="assets/stylesheets/stylesheet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="assets/javascript/jqueryfunctions.js"></script>';
    }

    protected function endHeader()
    {
        echo '</head>';
    }

    protected function beginBody()
    {
        echo '<body>';
    }

    protected function bodyContent()
    {
        if ($this->elements) $this->elements->show(true);
    }

    protected function endBody()
    {
        echo '</body>';
    }

    protected function endDoc()
    {
        echo '</html>';
    }
}