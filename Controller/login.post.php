<?php
require 'Models/User.php';
require 'Models/validator.php';
$user = new User;

$mess = Validator::user_login($user);
$users = $pdo->get_user($user->email);
$isUser = $pdo->is_user($user);
var_dump($isUser);