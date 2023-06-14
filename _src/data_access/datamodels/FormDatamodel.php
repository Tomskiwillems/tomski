<?php

namespace tomski\_src\data_access\datamodels;

class FormDatamodel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getFormFieldsByFormID(int $id, string $language) : array|false
    {
        $query = "SELECT name, type, (SELECT text_$language FROM text WHERE label = text.id) AS label, (SELECT text_$language FROM text WHERE 
        placeholder = text.id) AS placeholder, optional FROM form_formfields JOIN formfields ON (formfield_id=formfields.id) WHERE form_id = ?";
        $params = [$id];
        $result = $this->crud->selectUnique($query, $params);
        return $result;
    }
}