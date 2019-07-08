<?php



$router->get(  '' , 'Controller/login.php');
$router->get(  'logout' , 'Controller/logout.php');
$router->get( 'edit' ,'Controller/edit.php');
$router->get(  'signup', 'Controller/signup.php');
$router->post(  'signup', 'Controller/signup.post.php');
$router->post(  '' , 'Controller/login.post.php');
