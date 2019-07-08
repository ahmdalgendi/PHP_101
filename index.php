<?php
require 'Core/Router.php';
require 'Models/Database.php';
require 'Core/Request.php';
require 'Core/send_mail.php';

$pdo = new Database('include/vars.php');

$router = new Router;

require 'Core/routes.php';
$hell = 'hello world';
require $router-> direct(Request::uri()  , Request::method());