<?php


require 'Models/User.php';
require 'Models/validator.php';
$user_data = new User;

$err_mess = Validator::user_new($user_data);



if ( $err_mess == 'success' )
{
    $err_mess = "User successfully added";
    $res = $pdo->save_user($user_data);
    if (!$res)
        $err_mess = "Email already used";
}

 


$alert_at_login = true;
if($err_mess == "User successfully added")
 {   
     send_mail($user_data);

}
require $router ->direct('', "GET");
