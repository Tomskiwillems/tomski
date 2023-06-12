<?php

namespace tomski\_src\data_access\datamodels;

class FormDataModel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getFormFieldsByPage(int $page, string $language) : array|false
    {
        $query = "SELECT name, type, (SELECT text_$language FROM text WHERE label = text.id) AS label, (SELECT text_$language FROM text WHERE 
        placeholder = text.id) AS placeholder, optional FROM page_formfields JOIN formfields ON (formfield_id=formfields.id) WHERE page_id = ?";
        $params = [$page];
        $result = $this->crud->selectUnique($query, $params);
        return $result;
    }
}