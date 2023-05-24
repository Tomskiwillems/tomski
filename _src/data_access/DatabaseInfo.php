<?php

namespace tomski\_src\data_access;

class DatabaseInfo
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getListItemsByID($id)
    {
        switch ($id)
        {
            default:
        }
    }

    public function getLanguageOptions($id)
    {
        switch ($id)
        {
            case 1:
                return [1 => '<img src="assets/images/EN.png" alt="English Flag" width="25" height="20"></img> EN',
                        2 => '<img src="assets/images/NL.png" alt="Dutch Flag" width="25" height="20"></img> NL'];
        }
    }
}