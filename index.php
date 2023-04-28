<?php

require 'vendor/autoload.php';
require 'config.inc';

session_start();
$controller = new \tomski\_src\controllers\MainController();
$controller->handleRequest();