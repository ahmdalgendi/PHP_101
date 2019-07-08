<?php


class Database 
{
    
    private $host;
    private $user;
    private $pass;
    private $db;
    public $cxn;
            
    function __construct($filename) 
    {
        if(is_file($filename))
            include $filename;
        else
            throw new Exception ("Error!");

        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db   = $db;
        
        $this->connect();
    }
    
    private function connect()
    {
    
        //connect server
        $this->cxn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user , $this->pass,
                    array (PDO::ATTR_AUTOCOMMIT =>  PDO::ERRMODE_EXCEPTION ));
            
    }       
                
    function close()
    {
        unset($this->cxn);
        $this->cxn = NULL;
    
    }
    public function save_user($user)
    {
    
        $dubs = $this->get_user($user->email);
        if(sizeof($dubs)  > 0)
        {    
            return FALSE;
        }
        else{       
            $this->cxn->query(
                'insert into users (name , email , password , image) values ({$user->name} , {$user->email } , {$user->password} , {$user->image}'
            );
            return TRUE;
    }
    }
    public function update_user($user)
    {
        $this->cxn->query(
            'update  users set name = {$user->name} , email = {$user->email , password  ={$user->password}, image={$user->image} where email = {$user->email}'
         );
    }
    public function get_user($email)
    {
        return $this->cxn->query('select * from users where email = ' .$email);
    }
    
}
?>