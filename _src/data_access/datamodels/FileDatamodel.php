<?php

namespace tomski\_src\data_access\datamodels;

class FileDatamodel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getFoldersByFolder(int $folder): array|false
    {
        $query = "SELECT id, name FROM folders WHERE parent = ?";
        $params = [$folder];
        $result = $this->crud->selectPair($query, $params);
        return $result;
    }

//  =============================================

    public function getFilesByFolder(int $folder): array|false
    {
        $query = "SELECT id, name FROM files WHERE folder_id = ?";
        $params = [$folder];
        $result = $this->crud->selectPair($query, $params);
        return $result;
    }

//  =============================================

    public function getFileById(int $id): string|false
    {
        $query = "SELECT name FROM files WHERE id = ?";
        $params = [$id];
        $result = $this->crud->selectString($query, $params);
        return $result;
    }
}