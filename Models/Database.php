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
            return false;
        }
        else{
            try {  
                $hased_pass = password_hash($user->password, PASSWORD_DEFAULT);
                $stmt = "insert into users (name , email , password , image) values ('{$user->name}' , '{$user->email }' , '{$hased_pass}' , '{$user->image}')";
                
                $this->cxn->exec($stmt);
        }catch(PDOException $e) {
            echo "The user could not be added.<br>".$e->getMessage();
          }

            return true;
    }
    }
    public function update_user($user , $old_email)
    {
        
        $st =
            "update  users set name = '{$user->name}' , email = '{$user->email}' , password  ='{$user->password}' where email = '{$old_email}'"
         ;
        $stmt= $this->cxn->prepare($st);
        $stmt ->execute();
       
    }
    public function get_user($email)
    {
        $st = "select * from users where email = '{$email}'";
        
        $stmt= $this->cxn->prepare($st);
        $stmt ->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $results;
    }
    public function is_user($user)
    {
        $st = "select * from users where email = '{$user->email}'";
        
        $stmt= $this->cxn->prepare($st);
        $stmt ->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(sizeof($results) > 0)
        {
            return password_verify($user->password , $results[0]['password']);
        }
        return false;
    }
    public function delete_user($email)
    {
        $stmt = "DELETE FROM users where email = '{$email}'";
        var_dump($stmt);
        $this->cxn->exec($stmt);
    }
}
?>