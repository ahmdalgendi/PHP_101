<?php


require 'Models/User.php';
require 'Models/validator.php';
$user = new User;

$mess = Validator::user_new($user);
$res = $pdo->save_user($user);


if($res ==true)
{
if ( $mess == 'success' )
{
    $mess = "User successfully added";
}
}
else $mess = "Email already used";


$signUpResponse = true;

require $router ->direct('', "GET");