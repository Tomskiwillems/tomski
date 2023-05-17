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
                return '<p>You are successfully logged out.</p>';
            case 3:
                return '<p>You are succesfully logged in.</p>';
            case 4:
                return '<p>Password is incorrect.</p>';
            case 5:
                return '<p>There is no user registered with that email adress</p>';
            case 6:
                return '<p>You are successfully registered.</p>';
            case 7:
                return '<p>That email adress is already registered.</p>';
            case 8:
                return '<h1>$this->response["page"]</h1>';
            case 9:
                return '<h2>$this->response["subpage"]</h2>';
            case 10:
                return '<p>General text for software development</p>';
            case 11:
                return '<p>General text for music</p>';
            case 12:
                return '<p>General text for humor</p>';
            case 13:
                return '<p>General text for games</p>';

        }
    }

//  =============================================

    public function getFormInfoByPage(string $page)
    {
        switch ($page)
        {
            case "contact":
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

    public function getElementInfoByPage(string $page)
    {
        switch ($page)
        {
            case 1:
                return  [   1 =>   [    'type' => 'Text',
                                        'content' => 1,
                                        'class' => 'hometext',
                                        'order' => 10]];
            case 2:
                return  [   1 =>    [   'type' => 'Linklist',
                                        'content' => 'softwaredevelopment',
                                        'class' => 'submenu',
                                        'order' => 10],
                            2 =>    [   'type' =>   'Text',
                                        'content' => 9,
                                        'class' => 'subheader',
                                        'order' => 11],
                            3 =>    [   'type' => 'Text',
                                        'content' => 10,
                                        'class' => 'generaltext',
                                        'order' => 12]];
            case "music":
                return  [   1 =>    [   'type' => 'Linklist',
                                        'content' => 'music',
                                        'class' => 'submenu',
                                        'order' => 10],
                            2 =>    [   'type' =>   'Text',
                                        'content' => 9,
                                        'class' => 'subheader',
                                        'order' => 11],
                            3 =>    [   'type' => 'Text',
                                        'content' => 11,
                                        'class' => 'generaltext',
                                        'order' => 12]];
            case "humor":
                return  [   1 =>    [   'type' => 'Linklist',
                                        'content' => 'humor',
                                        'class' => 'submenu',
                                        'order' => 10],
                            2 =>    [   'type' =>   'Text',
                                        'content' => 9,
                                        'class' => 'subheader',
                                        'order' => 11],
                            3 =>    [   'type' => 'Text',
                                        'content' => 12,
                                        'class' => 'generaltext',
                                        'order' => 12]];
            case "games":
                return  [   1 =>    [   'type' => 'Linklist',
                                        'content' => 'games',
                                        'class' => 'submenu',
                                        'order' => 10],
                            2 =>    [   'type' =>   'Text',
                                        'content' => 9,
                                        'class' => 'subheader',
                                        'order' => 11],
                            3 =>    [   'type' => 'Text',
                                        'content' => 13,
                                        'class' => 'generaltext',
                                        'order' => 12]];
            case "contact":
                return  [   1 =>    [   'type' => 'Form',
                                        'content' => $page,
                                        'class' => 'contactform',
                                        'order' => 10]];
        }
    }
}