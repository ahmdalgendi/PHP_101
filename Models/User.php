<?php

class User
{
    function __construct()
    {
        if(isset($_POST['name']))
            $this->name = $_POST['name'];
        if(isset($_POST['email']))
            $this->email = $_POST['email'];
        if(isset($_POST['password']))
            $this->password =$_POST['password'];
        if(isset($_FILES["file-input"]))
            $this->image = addslashes(file_get_contents($_FILES["file-input"]["tmp_name"]));
        else $this->image = ""; 
    }
}

