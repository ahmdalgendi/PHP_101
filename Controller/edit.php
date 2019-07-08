<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION) && isset($_SESSION['user_data'] ) && isset($_SESSION['user_data']['email']) &&isset($_SESSION['user_data']['email']) )
{
    require 'Views/edit.view.php';
}
else{
    $alert_at_login = true;
    
    $err_mess = "You have to be logged in to show this page";
    require $router ->direct('', "GET");
}
