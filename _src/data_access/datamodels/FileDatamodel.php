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

    public function getFileById(int $id): array|false
    {
        $query = "SELECT id, name, folder_id FROM files WHERE id = ?";
        $params = [$id];
        $result = $this->crud->selectSingleRow($query, $params);
        return $result;
    }

//  =============================================

    public function getFolderById(int $id): array|false
    {
        $query = "SELECT id, name, parent FROM folders WHERE id = ?";
        $params = [$id];
        $result = $this->crud->selectSingleRow($query, $params);
        return $result;
    }
    
//  =============================================    

    public function getParentById(int $id): array|false
    {
        $query = "SELECT id, name, parent FROM `folders` WHERE id = (SELECT parent FROM folders WHERE id = ?)";
        $params = [$id];
        $result = $this->crud->selectSingleRow($query, $params);
        return $result;
    }
}