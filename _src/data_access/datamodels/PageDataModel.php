<?php

namespace tomski\_src\data_access\datamodels;

class PageDatamodel extends BaseDatamodel
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

    public function getPageName(int $page, string $language) : string|false
    {
        $query = "SELECT (SELECT text_$language FROM text WHERE name = text.id) AS name FROM pages WHERE id = ?";
        $params = [$page];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }

//  =============================================

    public function getPageIDByURLParam(string $urlparam, int $parent=0) : string|false
    {
        $query = "SELECT id FROM pages WHERE url = ? AND parent = ?";
        $params = [$urlparam, $parent];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }
}