<?php
$alert_at_login = true;
session_Start();
if(isset($_SESSION))
{ 
    $_SESSION = array();
    session_reset();
    session_destroy();
}
$err_mess = "Loged out successfully";
require $router ->direct('', "GET");
