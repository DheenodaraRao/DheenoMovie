<?php

class LoginModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function validateUser($username,$password){
        $stmt = $this->db->prepare("Select count(*) from Management where username=? 
        and password=?");

        $stmt->bind_param("ss",$username,$password);
        
        $valid = 0;
        $data = $stmt->execute();

        $stmt->bind_result($valid);

        while($stmt->fetch()){
            $valid = $valid;
        }
                   
        $valid = (int)$valid;
        if($valid == 1){
            return true;
        }
        else{
            return false;
        }
    }
}

?>