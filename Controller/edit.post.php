<?php

require 'Models/User.php';
require 'Models/validator.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_data = new User;
$mess = Validator::user_update($user_data);

if($mess != 'success')
{
    echo "<script type='text/javascript'>alert('$mess');</script>";
    header("location:/edit");
}

$current_user_data =$_SESSION['user_data'];
$new_user_data = new User;
if( strlen($user_data->name) > 0 && $user_data-> name != $current_user_data['name'])
{
    $new_user_data-> name =  $user_data ->name;
}
else {
    $new_user_data-> name =  $current_user_data['name'];
}
if(strlen($user_data->email) > 0 && $user_data-> name != $current_user_data['email'])
{
    $other_user = $pdo->get_user($user_data->email);
    if(sizeof ($other_user) > 0 )
    {
        
    }
    $new_user_data-> email =  $user_data ->email;
}
else {
    $new_user_data-> email =  $current_user_data['email'];
}

if(strlen($user_data->password) >0)
{
    $new_user_data-> password =  $user_data ->password;
}
else  $new_user_data-> password = $current_user_data['password'];
if(strlen($user_data->image)>0)
{
    $new_user_data-> image =  $user_data ->image;
}
else {
    $new_user_data-> image = $current_user_data ['image'];
}

var_dump($new_user_data);