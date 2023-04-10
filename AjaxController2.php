<?php

namespace Wiki\controllers;

use Exception;

class AjaxController2
{
    private   $request;

    public function handleRequest()
    {
        $this->getRequest();
        $this->performRequest();
    }

    private function getRequest(): array
    {
        $posted = ($_SERVER['REQUEST_METHOD'] === 'POST');
        return $this->request =
            [
                'posted' => $posted,
                'func' => \Wiki\src\Tools::getRequestVar('func', false, 'NOT SET')
            ];
    }

    private function performRequest()
    {
        try
        {
            ob_start();
            $class = "\Wiki\models\\".$this->request['func'];
            $ajaxfunction = new $class;
            $ajaxfunction->execute();
            ob_end_flush();
        }
        catch (Exception $e)
        {
            ob_end_clean();
            header('HTTP/1.1 500 Internal Server Error');
            echo $e->getMessage();
        }
    }
}