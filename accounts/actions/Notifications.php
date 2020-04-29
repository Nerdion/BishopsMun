<?php

include_once 'config.php';


class Notifications extends Database {
    function __construct() {
        $this->con = parent::getConnection();
    }
    
    function insertNotification($message) {
        $query= "insert into notifications (text) VALUES ('$message')";
        $this->con->query($query);
    }
    
    function getNotifications() {
        $query = "select * from notifications ";
        $result = $this->con->query($query);
        
        $data = array();
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row['text'];
            }
        }
        return $data;
    }
}