<?php 
require_once 'config.php';

class Auth extends Database{
    
    //register new users 
    public function register($name, $email, $password){
        $sql = "INSERT INTO users(name,email,password)VALUES(:name,:email,:pass)"; //declaring new variable :name, :email, :pass
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$name, 'email'=>$email, 'pass'=>$password]); //assigning new values to variable :name, :email, :pass
        return true;
    }
    
    //check if user already registered 
    public function user_exist($email){
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result; 
    }
    
    //user login
    public function login($email){
        $sql = "SELECT email, password FROM users WHERE email = :email AND deleted !=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result; 
    }
    
    //current user
    public function currentUser($email){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
} 

?>