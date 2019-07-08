<?php
    var_dump($_SESSION);

if(isset($_SESSION))
{
    
    require 'Views/edit.view.php';
}
else{
    require 'Views/edit.view.php';
}
