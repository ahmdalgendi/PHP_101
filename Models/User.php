<?php

class User
{
    function __construct()
    {
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->password =password_hash ($_POST['password'] , PASSWORD_DEFAULT);
        $this->image = addslashes(file_get_contents($_FILES["file-input"]["tmp_name"])); 
    }
}

