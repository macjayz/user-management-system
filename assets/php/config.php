<?php 
class Database {
    private $dns = "mysql:host=localhost;dbname=db_user_system";
    private $dbuser = "root";
    private $dbpass = "";
    
    public $conn;
    
    public function __construct(){
        try{
            $this->conn = new PDO($this->dns,$this->dbuser,$this->dbpass);
            
        }
        catch(PDOException $e){
            echo 'Error'.$e->getMessage();
        }
        return $this->conn;
    }
    //check input (security)
    public function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    
        return $data;
    }
    
    //Error and Success Message Alert

    public function showMessage($type, $message){
        return '<div class="alert alert-'.$type.' alert-dissmissble"> 
                    <button type = "button" class="close" data-dismiss="alert">&times;</button>
                    <strong class="text-center">'.$message.'</strong>
                </div>';
    }
}



?>