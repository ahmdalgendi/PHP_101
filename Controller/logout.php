<?php
$alert_at_login = true;
if(isset($_SESSION))
    session_destroy();
$err_mess = "Loged out successfully";
require $router ->direct('', "GET");
