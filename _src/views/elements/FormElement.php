<?php

namespace tomski\_src\views\elements;

class FormElement extends BaseElement
{
    protected $page;
    protected $formfields;
    protected $options;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(string $page, array $formfields, array $options, int $tree_order=0)
    {
        parent::__construct($tree_order);
        $this->page = $page;
        $this->formfields = $formfields;
        $this->options = $options;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function displayContent()
    {
        $content = $this->openForm();
        $content .= $this->showFields();
        $content .= $this->closeform();
        return $content;
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function openForm($action = '', $method = "POST")
    {
        return '<form id="form" action="' . $action . '" method="' . $method . '" >' . PHP_EOL . '
        <input type="hidden" name="page" value="' . $this->page . '" />' . PHP_EOL;
    }

//  =============================================

    private function closeForm($submit_caption = "Submit")
    {
        return '<button type="button" class="submitButton">' . $submit_caption . '</button>' . PHP_EOL
            . '	</form>' . PHP_EOL;
    }

//  =============================================

    private function showFields()
    {
        $content = '';
        foreach ($this->formfields as $fieldobject)
        {
            if ($fieldobject instanceof \tomski\_src\interfaces\iMultipleChoiceField)
            {
                $fieldobject->setOptions(array_shift($this->options));
            }
            $content .= $fieldobject->show();
        }
        return $content;
    }
}