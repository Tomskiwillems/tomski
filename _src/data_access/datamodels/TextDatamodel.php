<?php

namespace tomski\_src\data_access\datamodels;

class TextDataModel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getTextByID(int $id, string $language) : string|false
    {
        $query = "SELECT text_$language FROM text WHERE id = ?";
        $params = [$id];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }
}