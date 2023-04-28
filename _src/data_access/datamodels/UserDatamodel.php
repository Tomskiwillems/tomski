<?php

namespace tomski\_src\data_access\datamodels;

class UserDatamodel extends BaseDatamodel
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getUserLoginData(string $email): array|false
    {
        $query = "SELECT id, password FROM users WHERE email = ?";
        return $this->crud->selectSingleRow($query, [$email]);
    }

//  =============================================

    public function getUserEmail(string $email): string|false
    {
        $query = "SELECT email FROM users WHERE email = ?";
        return $this->crud->selectString($query, [$email]);
    }

//  =============================================

    public function insertNewUser(array $postresult): int|false
    {
        $query = "INSERT INTO users (email, `password`) VALUES (?, ?)";
        $params = [$postresult['email'], $postresult['password']];
        return $this->crud->insertData($query, $params);
    }

}