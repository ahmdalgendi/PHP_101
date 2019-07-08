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
    $alert_at_edit = true;
    $err_mess = $mess;
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
if(strlen($user_data->email) > 0 && $user_data-> email != $current_user_data['email'])
{
    $other_user = $pdo->get_user($user_data->email);
    if(sizeof ($other_user) > 0 )
    {
        $alert_at_edit = true;
        $err_mess= "Email already used";
        header("location: /edit");
    }
    $new_user_data-> email =  $user_data ->email;
}
else {
    $new_user_data-> email =  $current_user_data['email'];
}

if(strlen($user_data->password) >0)
{
    $hased_pass = password_hash($user_data ->password ,PASSWORD_DEFAULT);
    $new_user_data-> password = $hased_pass; 
}
else  $new_user_data-> password = $current_user_data['password'];

$ret =$pdo -> update_user($new_user_data , $current_user_data['email']);
$new_user_data = $pdo->get_user($new_user_data->email);
$_SESSION['user_data'] =(array) $new_user_data;

header("location:/edit");

