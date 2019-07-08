<?php
  

if(isset($_SESSION))
{
    require 'Views/edit.view.php';
}
else{
    $alert_at_login = true;
    
    $err_mess = "You have to be logged in to show this page";
    require $router ->direct('', "GET");
}
