<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
};

if(isset($_SESSION) && isset($_SESSION['user_data'] ) && isset($_SESSION['user_data']['email']) &&isset($_SESSION['user_data']['email']) )

{
    
    header("location:/edit");
}
require "Views/login.view.php";