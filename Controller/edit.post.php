<?php

require 'Models/User.php';
require 'Models/validator.php';

$user_data = new User;
$mess = Validator::user_update($user_data);
var_dump($_SESSION , $mess);
if($mess != 'success')
{
    echo "<script type='text/javascript'>alert('$mess');</script>";
}
$current_user_data =$_SESSION['user_data'];
$new_user_data = new User;
if( strlen($user_data->name) > 0 && $user_data-> name != $current_user_data['name'])
{
    $new_user_data-> name =  $user_data ->name;
}
if(strlen($user_data->email) > 0 && $user_data-> name != $current_user_data['email'])
{

}