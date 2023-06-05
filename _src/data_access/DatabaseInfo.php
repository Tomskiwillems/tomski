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

    public function getOptionsByID($id)
    {
        switch ($id)
        {
            case 1:
                return ['language'=> [  1 =>    'EN',
                                        2 =>    'NL']];
            case 2:
                return [1 =>    'EN',
                        2 =>    'NL'];
        }
    }
}

// <img src="assets/images/languageflags/EN.png"> 
// <img src="assets/images/languageflags/NL.png"> 