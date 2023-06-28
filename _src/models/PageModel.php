<?php

namespace tomski\_src\models;

class PageModel
{
    protected $response;
    protected $elementfactory;
    protected $elements;
    protected $page;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $response)
    {
        $this->response = $response;
        $this->elementfactory = new \tomski\_src\factories\ElementFactory($this->response);
    }

//  =============================================

    public function makePage(bool $fullpage, string $target)
    {
        if ($fullpage)
        {
            $this->addElement($this->makeHeader());
            $this->addElement($this->makeMainMenu());
            $this->addElement($this->makePageContent());
            $this->addElement($this->makeFooter());
            $this->addElement($this->makeMessages());
            $this->makeHtmlDocument();
            return $this->page;
        }
        else
        {
            if ($target == '.subpagecontent')
            {
                $content['content'] = $this->makeSubPageContent();
                $content['messages'] = $this->makeMessages();
            }
            elseif ($target == '.pagecontent')
            {
                $content['content'] = $this->makePageContent();
                $content['messages'] = $this->makeMessages();
            }
            else
            {
                $this->addElement($this->makeHeader());
                $this->addElement($this->makeMainMenu());
                $this->addElement($this->makePageContent());
                $this->addElement($this->makeFooter());
                $this->addElement($this->makeMessages());
                $content['content'] = $this->elements;
            }
            return $content;
        }
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function makeHeader()
    {
        return $this->elementfactory->getElementByClassName('header');
    }

//  =============================================

    private function makeMainMenu()
    {
        return $this->elementfactory->getElementByClassName('mainmenu');
    }

//  =============================================

    private function makePageContent()
    {
		return $this->elementfactory->getElementByClassName('pagecontent');
    }

//  =============================================

    private function makeSubPageContent()
    {
        return $this->elementfactory->getElementByClassName('subpagecontent');
    }

//  =============================================

    private function makeFooter()
    {
        return $this->elementfactory->getElementByClassName('footer');
    }

//  =============================================

    private function makeMessages()
    {
        return $this->elementfactory->getElementByClassName('messages');
    }

//  =============================================

    private function makeHtmlDocument()
    {
        $this->page = new \tomski\_src\views\elements\HtmlDocument($this->elements);
    }

//  =============================================

    private function addElement($element)
	{
		if (isset($this->elements)) $this->elements->insert($element);
		else $this->elements = $element;
	}
}