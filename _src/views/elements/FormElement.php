<?php

namespace tomski\_src\views\elements;

class FormElement extends BaseElement
{
    protected $formfields;
    protected $options;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        $formfieldfactory = new \tomski\_src\factories\FormfieldFactory;
        $this->formfields = $formfieldfactory->getFormfields($this->elementinfo['id'], $this->language);
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
        return '<div class="'.$this->elementinfo['class'].'"><form id="form" action="' . $action . '" method="' . $method . '" >' . PHP_EOL . '
        <input type="hidden" name="page" value="' . $this->response['page'] . '" />' . PHP_EOL;
    }

//  =============================================

    private function closeForm($submit_caption = "Submit")
    {
        return '<button type="button" class="submit">' . $submit_caption . '</button>' . PHP_EOL
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