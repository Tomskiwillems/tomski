<?php

namespace tomski\_src\data_access\datamodels;

class ElementDataModel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getElementsByPage(int $page) : array|false
    {
        $query = "SELECT type, IF(content = 'page_id', page_id, content) AS content, class, tree_order FROM page_elements JOIN elements ON (element_id=elements.id) WHERE page_id = ?";
        $params = [$page];
        $result = $this->crud->selectMultipleRows($query, $params);
        return $result;
    }
}