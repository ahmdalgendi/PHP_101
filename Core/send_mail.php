<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'include\autoload.php';
require 'include\vars.php';
function send_mail($user_data)
{
    require 'include\autoload.php';
    require 'include\vars.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = $email;
    $mail->Password = $email_pass;

    $mail->From = "ahmd.algendi@gmail.com";
    $mail->FromName = "Registration Form";
    
    $mail->AddAddress($user_data->email, $user_data->name);
    
    

    $mail->Subject = "Thank you for registeration!!";
    $mail->Body = "Thank you for Registration.\nWelcome to the family";
    $mail->WordWrap = 50; 

    if(!$mail->Send()) {
        // echo"bad";
        return false;
    } else {
        // echo "good";
        return true;
    }
}
