<?php

class Model{

    function __construct()
    {
        $hostname = "localhost";
        $user = "root";
        $password = "root";
        $database = "movie_mgnt";

        $this->db = new mysqli($hostname, $user, $password, $database);

        if($this->db->connect_error){
            die("No connection, $db->connect_error");
            require('controllers/errorController.php');
        }
    }

}

?>