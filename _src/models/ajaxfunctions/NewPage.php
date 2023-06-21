<?php

namespace tomski\_src\models\ajaxfunctions;

class NewPage extends BaseAjaxFunction
{

//  =============================================
//  PROTECTED METHODS
//  =============================================
    
    protected function getData(): bool
    {
        $posted = ($_SERVER['REQUEST_METHOD'] === 'POST');
        $request = ['posted'	=> $posted,
                    'page'  	=> \tomski\_src\tools\Tools::getRequestVar('page', $posted, 1),
                    'target'      => \tomski\_src\tools\Tools::getRequestVar('target', $posted, 'body'),
                    'id'		=> \tomski\_src\tools\Tools::getRequestVar('id', $posted, 0)];
        $validatemodel = new \tomski\_src\models\ValidateModel($request);
        $response = $validatemodel->validateRequest();
        if ($response === false) return false;
        $pagemodel = new \tomski\_src\models\PageModel($response);
        $page_elements = $pagemodel->makePage(false, $response['target']);
        if ($page_elements === false) return false;
        if ($response['target'] == 'body')
        {
            $this->data[] = ['target' => $response['target'], 'content' => $page_elements['content']->show(false)];
        }
        else
        {
            $this->data[] = ['target' => $response['target'], 'content' => $page_elements['content']->show(false)];
            $this->data[] = ['target' => '.messages', 'content' => $page_elements['messages']->show(false)];
        }
        return true;
    }
}