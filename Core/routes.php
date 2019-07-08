<?php



$router->get(  '' , 'Controller/login.php');
$router->get( 'edit' ,'Controller/edit.php');
$router->get(  'signup', 'Controller/signup.php');
$router->post(  'signup', 'Controller/signup.post.php');