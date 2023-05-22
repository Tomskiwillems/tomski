<?php

namespace tomski\_src\data_access;
use PDO, PDOStatement, PDOException;

class Crud
{
    protected PDO $db;
    protected PDOStatement $stmt;
    protected static $_instance = null;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public static function getInstance()
    {
        $class = get_called_class(); 
        if (is_null(static::$_instance))
        {
            static::$_instance = new $class();
        }
        return static::$_instance;
    }

//  =============================================

    public function isConnected() : bool
    {
        return is_object($this->db);
    }

//  =============================================

    public function insertData(string $query, array $params=[]) : int|false
    {
        if ($this->_execute($query, $params)) 
        {	
            return $this->db->lastInsertId();
        }	
        return false;
    }

//  =============================================

    public function updateData(string $query, array $params=[]) : int|false
    {
        if ($this->_execute($query, $params)) 
        {	
            return $this->stmt->rowCount();
        }	
        return false;
    }

//  =============================================

    public function deleteData(string $query, array $params=[]): int|false
    {
        if ($this->_execute($query, $params)) 
        {	
            return $this->stmt->rowCount();
        }	
        return false;
    }

//  =============================================

    public function selectString(string $query, array $params=[]): string|false
    {
        return $this->_executeAndFetch($query, $params, "fetchColumn", 0);
    }

//  =============================================

    public function selectSingleRow(string $query, array $params=[]): array|false
    {
        return $this->_executeAndFetch($query, $params, "fetch", PDO::FETCH_ASSOC);
    }

//  =============================================

    public function selectMultipleRows(string $query, array $params=[]): array|false
    {
        return $this->_executeAndFetch($query, $params, "fetchAll", PDO::FETCH_ASSOC);
    }

//  =============================================

    public function selectColumn(string $query, array $params=[], $column=0): array|false
    {
        return $this->_executeAndFetch($query, $params, "fetchAll", "PDO::FETCH_ASSOC, " . $column);
    }

//  =============================================

    public function selectPair(string $query, array $params=[]): array|false
    {
        return $this->_executeAndFetch($query ,$params, "fetchAll", PDO::FETCH_KEY_PAIR);
    }

//  =============================================

    public function selectUnique(string $query, array $params=[]): array|false
    {
        return $this->_executeAndFetch($query ,$params, "fetchAll", PDO::FETCH_UNIQUE);
    }

//  =============================================

    public function selectGroup(string $query, array $params=[]): array|false
    {
        return $this->_executeAndFetch($query, $params, "fetchAll", PDO::FETCH_GROUP);
    }

//  =============================================
//  PRIVATE METHODS
//  =============================================

    private function _execute(string $query, array $params): bool
    {
        try
        {
            $this->stmt = $this->db->prepare($query);
            return $this->stmt->execute($params);
        }
        catch (PDOException $e)
        {
            //ERROR OPVANGEN EN VERWERKEN
        }
    }

//  =============================================

    private function _executeAndFetch(string $query, array $params, string $fetchfunction, string $fetchmethod=""): string|array|false
    {
        if ($this->_execute($query, $params))
        {
            return $this->stmt->$fetchfunction($fetchmethod);
        }
        return false;
    }

//  =============================================

    private function __construct() 
    {     
            $this->db = new PDO("mysql:host=".\Config::PDOHOST.";dbname=".\Config::PDODATABASE,\Config::PDOUSER,\Config::PDOPASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                      
    }
}