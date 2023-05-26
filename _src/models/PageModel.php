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

    public function makePage(bool $fullpage)
    {
        if ($fullpage) $this->makeMainContent();
        $this->makePageContent();
        if ($fullpage) $this->makeFullPage();
        return $this->page;
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function makeMainContent()
    {
        $this->addElement($this->elementfactory->getMenulistElement(1, 'mainmenu', $this->response['language'], 1));
        $this->addElement($this->elementfactory->getFooterElement('footer', $this->response['language'], 99));
    }

//  =============================================

    private function makePageContent()
    {
        $this->addElement($this->elementfactory->getHeaderElement($this->response['page'], 'mainheader', $this->response['language'], 4));
        $this->databaseinfo = new \tomski\_src\data_access\datamodels\ElementDatamodel;
        $elements = $this->databaseinfo->getElementsByPage($this->response['page']);
        $this->elementfactory = new \tomski\_src\factories\ElementFactory;
        foreach ($elements as $element)
        {
            $function = 'get'.$element['type'].'Element';
            $object = $this->elementfactory->$function($element['content'], $element['class'], $this->response['language'], $element['tree_order']);
            if ($element['type'] == 'Form' && isset($this->response['formfields']))
            {
                $object->setFormfields($this->response['formfields']);
            }
            $this->addElement($object);
        }
        if ($this->response['message']) $this->addElement($this->elementfactory->getTextElement($this->response['message'], 'message', $this->response['language'], 2));
        if ($this->response['errormessage']) $this->addElement($this->elementfactory->getTextElement($this->response['errormessage'], 'errormessage', $this->response['language'], 3));
    }

//  =============================================

    private function makeFullPage()
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