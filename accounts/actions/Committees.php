<?php

include_once 'config.php';

class Committees extends Database {
    protected  $query;
    protected $result;
    protected $con;
    public $committeeList;
    
    function __construct() {
        $this->committeeList = array();
        $this->con = parent::getConnection();
    }
    
    function getCommitteeNameByID($id) {
        $this->query = "SELECT name from committee where id= '$id' limit 1";
        $committeeName =  $this->con->query($this->query);
        $committeeName = $committeeName->fetch_assoc();
        
        return $committeeName['name'];
    }
    
    function getCommitteeIDbyName($name) {
        $this->query = "SELECT id from committee where name= '$name' limit 1";
        $committeeName =  $this->con->query($this->query);
        $committeeName = $committeeName->fetch_assoc();
        
        return $committeeName['id'];
    }
    
    
    function getCommitteesList() {
        $this->query = "SELECT * from committee";
        $this->result =  $this->con->query($this->query);
        if($this->result->num_rows > 0) {
            while($row = $this->result->fetch_assoc()) {
                $this->committeeList[] = $row;
            }
            //print_r($this->committeeList);
        }
        return $this->committeeList;
    }
}

/*
 $testing = new Committees();
 $testing->getCommitteesList();*/
    
?>