<?php

class Database {
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;
    protected $con;
    
    function getConnection() {
        
        $this->servername = "localhost";
        $this->username = "u752327893_maindb";
        $this->password = "Chaicreamroll24@";
        $this->dbname = "u752327893_mun";
        // Create connection
        $con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $con;
    }
}

?>