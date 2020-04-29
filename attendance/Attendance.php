<?php

include_once '../accounts/actions/config.php';

class Attendance extends Database {
    function __construct() {
        $this->con = parent::getConnection();
    }

    function getEvents() {
        $this->eventsList = array();
        $this->query = "SELECT * from events";
        $this->result =  $this->con->query($this->query);
        if($this->result->num_rows > 0) {
            while($row = $this->result->fetch_assoc()) {
                $this->eventsList[] = $row;
            }
        }
        return $this->eventsList;
    }
    
    function getAllDetails() {
        $sql = "select names.id, names.fullName, allotment.country, committee.name from names
        INNER JOIN allotment INNER JOIN committee where allotment.orgID = committee.id";

        $result = $this->con->query($sql);
        $allRecords = [];
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $allRecords[] = $row;
            }
        }
        return json_encode($allRecords);
    }

    function insertData($userID, $eventID) {
        $sql = "select * from attendance where userID= '$userID' and eventID='$eventID'";
        $result = $this->con->query($sql);

        if($result->num_rows > 0) {
            return -1;
        } else if($result->num_rows == 0){
            $sql = "insert into attendance(userID, eventID) VALUES('$userID','$eventID')";
            if ($this->con->query($sql) === TRUE) {
                echo "inserted attendance";
                return 1;
            } else {
                echo "Error: " . $sql . "<br>" . $this->con->error;
            }
        }
        
    }

    function getDetailsByID($userID) {
        $sql = "select names.id, names.fullName, allotment.country, committee.name from 
        names INNER JOIN allotment INNER JOIN committee
         where allotment.nameID = '$userID' and names.id = '$userID' and allotment.orgID = committee.id";

        $result =  $this->con->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
               return $row;
            }
        } else {
            return "0 results";
        }
    }

    function seeAttendance($eventID, $committeeID) {
        $this->attendance = array();
        $sql = "select ";
        
        if($eventID == 1) {
            $sql .= " securityattendance.confiscated, ";
        }

        $sql .= " names.fullName, events.eventName, allotment.country, 
        committee.name, attendance.timestamp 
        from committee inner join names inner join events 
        inner join attendance inner join allotment ";

        if($eventID == 1) {
            $sql .= " inner join securityattendance ";
        }

        $sql .= "where attendance.userID=names.id and 
        events.id=attendance.eventID 
        and names.id=allotment.nameID and 
        committee.id = allotment.orgID ";
        
        if($eventID != '') {
            $sql .= " and events.id = '$eventID' ";
        }

        if($committeeID != '') {
            $sql .= "and committee.id = '$committeeID'";
        }

        if($eventID == 1) {
            $sql .= "and securityattendance.userID = attendance.userID ";
        }

        $this->result =  $this->con->query($sql);

        if($this->result->num_rows > 0) {
            while($row = $this->result->fetch_assoc()) {
                $this->attendance[] = $row;
            }
        }
        return $this->attendance;
    }

    function seeAbsentism() {
        $absentism = array();

        $sql = "select names.id, names.fullName from names left join attendance on names.id = attendance.userID where attendance.userID IS NULL";
        $result = $this->con->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $absentism[] = $row;
            }
        }

        return $absentism;
    }


    function volunteerLogin($username, $password) {
        $sql = "select committee from volunteer where username='$username' and password='$password'";
        $result = $this->con->query($sql);
        
        if($result->num_rows == 1) {
            session_start();
           $row = $result->fetch_assoc();
           $_SESSION['volunteerLogin'] = $row['committee'];
           return 'y';
        } else {
            return 'er';
        }
    }

    function insertConfiscated($userID, $confiscated) {
        $sql = "insert into securityattendance(userID, confiscated) VALUES ('$userID','$confiscated')";
        $this->con->query($sql);
    }

    function getConfiscatedID($userID) {
        $sql = "select securityattendance.id from securityattendance where securityattendance.userID = '$userID'";
        $result = $this->con->query($sql);
        
        if($result->num_rows > 0) {
            $data =  $result->fetch_assoc();
            return $data;
        } else {
            return $sql;
        }
    }
}
?>