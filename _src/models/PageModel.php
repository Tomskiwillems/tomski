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
        $this->elementfactory = new \tomski\_src\factories\ElementFactory($this->response, $this->response['language']);
    }

//  =============================================

    public function makePage(bool $fullpage, string $target)
    {
        if ($fullpage)
        {
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
                $this->elements['content'] = $this->makeSubPageContent();
                $this->elements['messages'] = $this->makeMessages();
            }
            else
            {
                $this->elements['content'] = $this->makePageContent();
                $this->elements['messages'] = $this->makeMessages();
            }
            return $this->elements;
        }
    }

//  =============================================
//  PRIVATE METHODS
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