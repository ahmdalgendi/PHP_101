<?php
require 'Core/Router.php';
require 'Models/Database.php';
require 'Core/Request.php';
$pdo = new Database('include/vars.php');
$stmt  = $pdo-> cxn->query('SELECT * FROM users');


$router = new Router;

require 'Core/routes.php';

require $router-> direct(Request::uri()  , Request::method());