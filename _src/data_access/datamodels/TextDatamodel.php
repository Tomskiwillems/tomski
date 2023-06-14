<?php

namespace tomski\_src\data_access\datamodels;

class TextDatamodel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getTextByTextID(int $id, string $language) : string|false
    {
        $query = "SELECT text_$language FROM text WHERE id = ?";
        $params = [$id];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }

//  =============================================

    public function getTextByElementID(int $id, string $language) : string|false
    {
        $query = "SELECT text_$language FROM text JOIN element_text ON (text.id = text_id) WHERE element_id = ?";
        $params = [$id];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }
}