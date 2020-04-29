<?php

include_once 'config.php';
include_once 'Names.php';
include_once 'Allotment.php';

class Backup extends Database {
    protected $con;
    
    function __construct() {
        $this->con = parent::getConnection();
    }
    
    function backupNames($nameID) {
        $names = new Names();
        $allotment = new Allotment();
        
        $adminName = $_SESSION['adminLogin'];
        $queryAdminId = "select id from admin where name = '$adminName'";
        $adminID = $this->con->query($queryAdminId);
        $adminID = $adminID->fetch_assoc();
        $adminID = $adminID['id'];
        
        $dataOne = $names->getInfoById($nameID);
        
        print_r($dataOne);
        
        $data = array();
        foreach($dataOne as $lineescape) {
            $data[] = mysqli_real_escape_string($this->con, $lineescape);
        }
        
        if($data[21] == 1) {
            $allotmentID = $allotment->getAllotmentDetailsByNameID($data['id']);
            $allotmentID = $allotmentID['id'];
        } else {
            $allotmentID = NULL;
        }
        
        print_r($data);
        
        $nowDate = gmdate("Y-m-d H:i:s");
        
        $sql = "insert into backup(nameID, fullName, mail1, mail2, ph1, ph2, class, institution, priorMUN, adminID, allotmentID, timestamp)
            VALUES (
            '".$data[0]."',
            '".$data[1]."',
            '".$data[3]."',
            '".$data[4]."',
            '".$data[5]."',
            '".$data[6]."',
            '".$data[7]."',
            '".$data[8]."',
            '".$data[9]."',
            '".$adminID."',
            '".$allotmentID."',
            '".$nowDate."'
            );
        ";
        
        if ($this->con->query($sql) === TRUE) {
            echo "Backup working";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
        
    }
    
    function backupAllot($nameID, $allotmentID) {
        $names = new Names();
        
        $adminName = $_SESSION['adminLogin'];
        $queryAdminId = "select id from admin where name = '$adminName'";
        $adminID = $this->con->query($queryAdminId);
        $adminID = $adminID->fetch_assoc();
        $adminID = $adminID['id'];
        
        $dataOne = $names->getInfoById($nameID);
        
        print_r($dataOne);
        
        $data = array();
        foreach($dataOne as $lineescape) {
            $data[] = mysqli_real_escape_string($this->con, $lineescape);
        }
        
        print_r($data);
        
        $nowDate = gmdate("Y-m-d H:i:s");
        
        $sql = "insert into backup(nameID, fullName, mail1, mail2, ph1, ph2, class, institution, priorMUN, adminID, allotmentID, timestamp) 
            VALUES (
            '".$data[0]."',
            '".$data[1]."',
            '".$data[3]."',
            '".$data[4]."',
            '".$data[5]."',
            '".$data[6]."',
            '".$data[7]."',
            '".$data[8]."',
            '".$data[9]."',
            '".$adminID."',
            '".$allotmentID."',
            '".$nowDate."'
            );
        ";
        
        if ($this->con->query($sql) === TRUE) {
            echo "Backup working";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
        
    }
    
    function backupTownscript($dataOne) {
        $names = new Names();
        
        $adminName = $_SESSION['adminLogin'];
        $queryAdminId = "select id from admin where name = '$adminName'";
        $adminID = $this->con->query($queryAdminId);
        $adminID = $adminID->fetch_assoc();
        $adminID = $adminID['id'];
        
        $data = array();
        foreach($dataOne as $lineescape) {
            $data[] = mysqli_real_escape_string($this->con, $lineescape);
        }
        
        print_r($data);
        $allotmentID = NULL;
        $nowDate = gmdate("Y-m-d H:i:s");
        
        $sql = "insert into backup(nameID, fullName, mail1, mail2, ph1, ph2, class, institution, priorMUN, adminID, allotmentID, timestamp)
            VALUES (
            '".$data[0]."',
            '".$data[1]."',
            '".$data[2]."',
            '".$data[3]."',
            '".$data[4]."',
            '".$data[5]."',
            '".$data[7]."',
            '".$data[6]."',
            '".$data[8]."',
            '".$adminID."',
            '".$allotmentID."',
            '".$nowDate."'
            );
        ";
        
        if ($this->con->query($sql) === TRUE) {
            echo "Backup working";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
    }
}


?>