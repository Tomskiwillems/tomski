<?php

namespace tomski\_src\factories;

class ElementFactory
{
    protected $response;
    protected $language;
    protected $elementdatamodel;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct($response, $language)
    {
        $this->response = $response;
        $this->language = $language;
        $this->elementdatamodel = new \tomski\_src\data_access\datamodels\ElementDatamodel();
    }

//  =============================================

    public function getElementByClassName(string $classname)
    {
        $elementinfo = $this->elementdatamodel->getElementByClassName($classname);
        return $this->getSingleElement($elementinfo);
    }

//  =============================================

    public function getContainerElements(string $id)
    {
        $elementinfo = $this->elementdatamodel->getContainerElements($id, $this->response['page']);
        return $this->getMultipleElements($elementinfo);
    }

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getSingleElement($elementinfo)
    {
        if ($elementinfo == false) return false;
        $class = '\tomski\_src\views\elements\\'.$elementinfo['type'].'Element';
        $element = new $class($elementinfo, $this->response, $this->language);
        if ($element instanceof \tomski\_src\interfaces\iContainerElement)
        {
            $containerelements = $this->getContainerElements($elementinfo['id'], $this->response['page']);
            if ($containerelements == false) return false;
            $element->setContainerElements($containerelements);
        }
        return $element;
    }

//  =============================================

    protected function getMultipleElements($elementinfo)
    {
        if ($elementinfo == false) return false;
        foreach ($elementinfo as $index => $elementinfo)
        {
            $class = '\tomski\_src\views\elements\\'.$elementinfo['type'].'Element';
            $element = new $class($elementinfo, $this->response, $this->language);
            $collection[$index] = $element;
            if ($element instanceof \tomski\_src\interfaces\iContainerElement)
            {
                $containerelements = $this->getContainerElements($elementinfo['id']);
                if ($containerelements == false) return false;
                $element->setContainerElements($containerelements);
            }
        }
        return $collection;
    }
}