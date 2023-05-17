<?php

namespace tomski\_src\data_access\datamodels;

class PageDataModel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getMenuItems(int $parent, string $language) : array|false
    {
        $query = "SELECT id, name_$language FROM pages WHERE parent_id = ?";
        $params = [$parent];
        $result = $this->crud->selectPair($query, $params);
        return $result;
    }

//  =============================================

    public function getParentID(int $page) : string|false
    {
        $query = "SELECT parent_id FROM pages WHERE id = ?";
        $params = [$page];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }

//  =============================================

    public function getPageName(int $page, string $language) : string|false
    {
        $query = "SELECT name_$language FROM pages WHERE id = ?";
        $params = [$page];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }

}