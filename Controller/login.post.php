<?php
require 'Models/User.php';
require 'Models/validator.php';
$user = new User;

$mess = Validator::user_login($user);
$users = $pdo->get_user($user->email);
$isUser = $pdo->is_user($user);
if($isUser)
{
    $user = $pdo->get_user($user->email)[0];
    session_start();
    $_SESSION['user_data'] = $user;
    var_dump($_SESSION);
    $err_mess = 'Log in success\nYou can edit your data';

    require $router ->direct('edit', "GET");
}
else {
    $err_mess = "Wrong Email or password\nSign in again";
    $alert_at_login =true;
    require $router ->direct('', "GET");

}
