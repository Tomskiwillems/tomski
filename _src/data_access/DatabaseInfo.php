<?php

namespace tomski\_src\data_access;

class DatabaseInfo
{

//  =============================================
//  PUBLIC METHODS
//  =============================================

    public function getTextByID(int $id)
    {
        switch ($id)
        {
            case 1:
                return '<p>Welcome to the site of Tom Willems. Here you find a lot of information about what Tom does and what he has made.</p>';
            case 2:
                return '<p>General text for software development</p>';
            case 3:
                return '<p>General text for music</p>';
            case 4:
                return '<p>General text for humor</p>';
            case 5:
                return '<p>General text for games</p>';
            case 6:
                return '<p>If you would like to ask me a question or contact me for any other reason, please fill in the form below.</p>';
            case 7:
                return '<p>You are succesfully logged in.</p>';
            case 8:
                return '<p>Password is incorrect.</p>';
            case 9:
                return '<p>There is no user registered with that email adress</p>';
            case 10:
                return '<p>You are successfully registered.</p>';
            case 11:
                return '<p>That email adress is already registered.</p>';
            case 12:
                return '<p>You are successfully logged out.</p>';         
        }
    }

//  =============================================

    public function getFormInfoByPage(string $page)
    {
        switch ($page)
        {
            case "6":
                return [    'name' =>       [   'type' => 'text',
                                                'label' => 'Name',
                                                'placeholder' => 'Enter your name'],
                            'email' =>      [   'type' => 'email',
                                                'label' => 'E-mail',
                                                'placeholder' => 'Enter your email address'],
                            'message' =>    [   'type' => 'textarea',
                                                'label' => 'Message',
                                                'placeholder' => 'Enter your message']];
                break;
            case "login":
                return  [   'email' =>      [   'type' => 'email',
                                                'label' => 'Email',
                                                'placeholder' => 'Enter your email address'],
                            'password' =>   [   'type' => 'password',
                                                'label' => 'Password',
                                                'placeholder' => 'Enter your password']];
                break;
            case "register":
                return  [   'email' =>      [   'type' => 'email',
                                                'label' => 'Email',
                                                'placeholder' => 'Enter your email address'],
                            'password' =>   [   'type' => 'newpassword',
                                                'label' => 'Password',
                                                'placeholder' => 'Enter your password']];
        }
    }

//  =============================================

    public function getListItemsByID($id)
    {
        switch ($id)
        {
            default:
        }
    }

}