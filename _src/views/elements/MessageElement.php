<?php

namespace tomski\_src\views\elements;

class MessageElement extends TextElement
{
    protected $content;
    protected $messageclass;

//  =============================================
//  PROTECTED METHODS
//  =============================================

    protected function getContent()
    {
        if (isset($this->response['message']))
        {
            $message = $this->response['message'];
            $this->messageclass = 'message';
        }
        elseif (isset($this->response['errormessage']))
        {
            $message = $this->response['errormessage'];
            $this->messageclass = 'errormessage';
        }
        else return true;
        $textdatamodel = new \tomski\_src\data_access\datamodels\TextDatamodel;
        $this->content = $textdatamodel->getTextByTextID($message, $this->language);
        if ($this->content == false) return false;
        return true;
    }

//  =============================================

    protected function displayContent()
    {
        $content = '<div class="'.$this->elementinfo['class'].'">';
        if (isset($this->content)) $content .= '<div class="'.$this->messageclass.'" data-page="'.$this->response['page'].'">'.$this->content.'</div>';
        $content .= '</div>';
        return $content;
    }
}