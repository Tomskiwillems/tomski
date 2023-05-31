<?php

namespace tomski\_src\models;

class PageModel
{
    protected $response;
    protected $elementfactory;
    protected $elements;
    protected $page;
    protected $pagecontent;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct(array $response)
    {
        $this->response = $response;
        $this->elementfactory = new \tomski\_src\factories\ElementFactory;
    }

//  =============================================

    public function makePage(bool $fullpage)
    {
        if ($fullpage) $this->makeMainContent();
        $this->makePageContent($fullpage);
        if ($fullpage) $this->makeFullPage();
        return $this->page;
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function makeMainContent()
    {
        $mainmenu = $this->elementfactory->getMenuListElement(1, 'mainmenulist', $this->response['language'], 1);
        $mainmenudropdown = $this->elementfactory->getSelectedDropdownElement(2, 'mainmenudropdown', $this->response['language'], 2);
        $mainmenudropdown->getSelectedOption($this->response['language']);
        $mainmenu->insert($mainmenudropdown);
        $this->addElement($this->elementfactory->getContainerElement($mainmenu, 'mainmenu', $this->response['language'], 1));
        $this->addElement($this->elementfactory->getFooterElement('footer', $this->response['language'], 99));
    }

//  =============================================

    private function makePageContent(bool $fullpage)
    {
        $pagecontent = ($this->elementfactory->getHeaderElement($this->response['page'], 'mainheader', $this->response['language'], 4));
        $elementdatamodel = new \tomski\_src\data_access\datamodels\ElementDatamodel;
        $elements = $elementdatamodel->getElementsByPage($this->response['page']);
        foreach ($elements as $element)
        {
            $function = 'get'.$element['type'].'Element';
            $object = $this->elementfactory->$function($element['content'], $element['class'], $this->response['language'], $element['tree_order']);
            if ($element['type'] == 'Form' && isset($this->response['formfields']))
            {
                $object->setFormfields($this->response['formfields']);
            }
            $pagecontent->insert($object);
        }
        if ($this->response['message']) $pagecontent->insert($this->elementfactory->getTextElement($this->response['message'], 'message', $this->response['language'], 2));
        if ($this->response['errormessage']) $pagecontent->insert($this->elementfactory->getTextElement($this->response['errormessage'], 'errormessage', $this->response['language'], 3));
        $pagecontainer = $this->elementfactory->getContainerElement($pagecontent, 'pagecontent', $this->response['language'], 10);
        if ($fullpage) $this->addElement($pagecontainer);
        else $this->page = $pagecontainer;
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