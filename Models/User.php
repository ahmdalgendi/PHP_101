<?php

class User
{
    function __construct($user_data)
    {
        $this->name = $user_data['name'];
        $this->email = $user_data['email'];
        $this->password =password_hash ($user_data['password']);
        $this->image = $user_data['image'];
    }
    
}
