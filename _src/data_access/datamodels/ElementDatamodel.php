<?php

namespace tomski\_src\data_access\datamodels;

class ElementDatamodel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getElementByClassName(string $classname): array|false
    {
        $query = "SELECT elements.id, type, class, tree_order FROM container_elements JOIN elements ON (element_id=elements.id) WHERE class = ?";
        $params = [$classname];
        $result = $this->crud->selectSingleRow($query, $params);
        return $result;
    }

//  =============================================

    public function getContainerElements(int $id, int $page): array|false
    {
        $query = "SELECT elements.id, type, class, tree_order FROM container_elements JOIN elements ON (element_id=elements.id) WHERE container_id = ? AND page_id = ? OR container_id = ? AND page_id = 0";
        $params = [$id, $page, $id];
        $result = $this->crud->selectMultipleRows($query, $params);
        return $result;
    }
}