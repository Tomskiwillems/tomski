<?php

namespace tomski\_src\data_access\datamodels;

class OptionDatamodel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getOptionsByElementID(int $id): array|false
    {
        $query = "SELECT tree_order, name, selectedoption FROM element_options JOIN options ON (option_id=options.id) WHERE element_id = ?";
        $params = [$id];
        $result = $this->crud->selectUnique($query, $params);
        return $result;
    }

//  =============================================

    public function getLanguageOptions(): array|false
    {
        $query = "SELECT id, name FROM languages";
        $params = [];
        $result = $this->crud->selectPair($query, $params);
        return $result;
    }
}