<?php

namespace tomski\_src\data_access\datamodels;

class DataModel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getData(string $table, string $page, string $language) : array|false
    {
        $query = "SELECT id, class, text FROM ? WHERE page = ? AND language = ?";
        $params = [$table, $page, $language];
        $result = "Nog in te vullen"; //VOEG CRUD FUNCTIONALITEIT TOE
        return $result;
    }

//  =============================================

    public function getFormInfo(string $page, string $language) : array|false
    {
        $query = "Nog in te vullen"; //VUL form_info TABEL VOLLEDIG AAN
        $params = [$page, $language];
        $result = "Nog in te vullen"; //VOEG CRUD FUNCTIONALITEIT TOE
        return $result;
    }
}