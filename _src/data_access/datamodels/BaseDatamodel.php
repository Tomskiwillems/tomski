<?php

namespace tomski\_src\data_access\datamodels;
use Error;

abstract class BaseDatamodel
{
    protected $crud;

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function __construct()
    {
        $this->crud = \tomski\_src\data_access\Crud::getInstance();
        if ($this->crud->isConnected() === false)
        {
            throw new Error("Failed to connect to the database.");
        }
    }
}