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
                    'language'	=> \tomski\_src\tools\Tools::getRequestVar('language', $posted, 1),
                    'id'		=> \tomski\_src\tools\Tools::getRequestVar('id', $posted, 0)];
        $validatemodel = new \tomski\_src\models\ValidateModel($request);
        $response = $validatemodel->validateRequest();
        if ($response === false) return false;
        $pagemodel = new \tomski\_src\models\PageModel($response);
        $content = $pagemodel->makePage(false);
        if ($content === false) return false;
        $this->data[] = ['target' => '.pagecontent', 'content' => $content->show(false)];
        return true;
    }
}