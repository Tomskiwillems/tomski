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

    public function __construct(string $page, string $class, string $language, int $tree_order=0)
    {
        parent::__construct($class, $language, $tree_order);
        $this->page = $page;
    }

//  =============================================

    public function setFormfields(array $formfields)
    {
        $this->formfields = $formfields;
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        if (isset($this->formfields)) return true;
        $formfieldfactory = new \tomski\_src\factories\FormfieldFactory;
        $this->formfields = $formfieldfactory->getFormfields($this->page, $this->language);
        if ($this->formfields == false) return false;
        return true;
    }

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
        return '<div class="'.$this->class.'"><form id="form" action="' . $action . '" method="' . $method . '" >' . PHP_EOL . '
        <input type="hidden" name="page" value="' . $this->page . '" />' . PHP_EOL;
    }

//  =============================================

    private function closeForm($submit_caption = "Submit")
    {
        return '<button type="button" id="submit">' . $submit_caption . '</button>' . PHP_EOL
            . '	</form></div>' . PHP_EOL;
    }

//  =============================================

    private function showFields()
    {
        $content = '';
        foreach ($this->formfields as $fieldobject)
        {
            if ($fieldobject instanceof \tomski\_src\interfaces\iMultipleChoiceField)
            {
                // options toevoegen!
                $fieldobject->setOptions(array_shift($this->options));
            }
            $content .= $fieldobject->show();
        }
        return $content;
    }
}