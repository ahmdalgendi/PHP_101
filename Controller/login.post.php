<?php
require 'Models/User.php';
require 'Models/validator.php';

$user = new User;

$mess = Validator::user_login($user);
$users = $pdo->get_user($user->email);
$isUser = $pdo->is_user($user);
if($isUser)
{
    session_start();
    $user = $pdo->get_user($user->email)[0];
    $_SESSION['user_data'] = $user;
    $err_mess = 'Log in success\nYou can edit your data';
    // var_dump($_SESSION);
    require $router->direct('edit', "GET");
}
else {
    $err_mess = "Wrong Email or password\nSign in again";
    $alert_at_login =true;
    header("location: /");

}
