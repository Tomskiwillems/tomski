<?php

namespace tomski\_src\data_access\datamodels;

class PageDataModel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getMenuItems(int $parent, string $language) : array|false
    {
        $query = "SELECT id, (SELECT text_$language FROM text WHERE name = text.id) AS name FROM pages WHERE parent_id = ?";
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

    public function getPageName(int $page, string $language='EN') : string|false
    {
        $query = "SELECT (SELECT text_$language FROM text WHERE name = text.id) AS name FROM pages WHERE id = ?";
        $params = [$page];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }

}