<?php


require 'Models/User.php';
require 'Models/validator.php';
$user_data = new User;

$mess = Validator::user_new($user_data);
$res = $pdo->save_user($user_data);


if($res ==true)
{
if ( $mess == 'success' )
{
    $mess = "User successfully added";
}
}
else $mess = "Email already used";


$signUpResponse = true;
if($mess == "User successfully added")
    send_mail($user_data);
require $router ->direct('', "GET");