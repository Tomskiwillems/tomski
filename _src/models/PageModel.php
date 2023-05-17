<?php

namespace tomski\_src\models;

class PageModel
{
    protected $response;
    protected $elementfactory;
    protected $databaseinfo;
    protected $elements;
    protected $page;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $response)
    {
        $this->response = $response;
    }

//  =============================================

    public function makePage()
    {
        $this->makePageContent();
        $this->makeMainContent();
        return $this->page;
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function makePageContent()
    {
        $this->elementfactory = new \tomski\_src\factories\ElementFactory;
        $this->databaseinfo = new \tomski\_src\data_access\DatabaseInfo;
        $elements = $this->databaseinfo->getElementInfoByPage($this->response['page']);
        foreach ($elements as $element)
        {
            $function = 'get'.$element['type'].'Element';
            $object = $this->elementfactory->$function($element['content'], $element['class'], $element['order']);
            if ($element['type'] == 'Form' && isset($this->response['formfields']))
            {
                $object->setFormfields($this->response['formfields']);
            }
            $this->addElement($object);
        }
    }

//  =============================================

    private function makeMainContent()
    {
        $this->addElement($this->elementfactory->getLinklistElement('main', 'mainmenu', 1));
        $this->addElement($this->elementfactory->getTextElement(8, 'header', 4));
        $this->addElement($this->elementfactory->getFooterElement('footer', 99));
        if ($this->response['message']) $this->addElement($this->elementfactory->getTextElement($this->response['message'], 'message', 2));
        if ($this->response['errormessage']) $this->addElement($this->elementfactory->getTextElement($this->response['errormessage'], 'errormessage', 3));
        $this->page = new \tomski\_src\views\elements\HtmlDocument($this->elements);
    }

//  =============================================

    private function addElement($element)
	{
		if (isset($this->elements)) $this->elements->insert($element);
		else $this->elements = $element;
	}
}