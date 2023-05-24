<?php

namespace tomski\_src\models\ajaxfunctions;

class NewPage extends BaseAjaxFunction
{
    
    protected function getData(): bool
    {
        $posted = ($_SERVER['REQUEST_METHOD'] === 'POST');
        $request = ['posted'	=> $posted,
                    'page'  	=> \tomski\_src\tools\Tools::getRequestVar('page', $posted, 1),
                    'language'	=> \tomski\_src\tools\Tools::getRequestVar('language', $posted, 'EN'),
                    'id'		=> \tomski\_src\tools\Tools::getRequestVar('id', $posted, 0)];
        $validatemodel = new \tomski\_src\models\ValidateModel($request);
        $response = $validatemodel->validateRequest();
        $btreebuilder = new \Wiki\views\BTreeBuilder($response);
        $btree = $btreebuilder->makeTree(false);
        $this->data[] = ['target' => '.main-content', 'content' => $btree->showTree(false)];

        if (isset($response['menu_change']))
        {
            $infoarray = new \Wiki\data_access_layer\InfoArrays();
            $menu_items = $infoarray->getMenuItems();
            $menu = new \Wiki\views\MenuElement($menu_items, 1);
            $this->data[] = ['target' => '.main_menu', 'content' => $menu->show(false)];
        }
        return true;
    }
}