
<?php

include_once 'config.php';

class Preference extends Database {
    protected $con;
    public $namesList;
    protected $query;
    
    function __construct() {
        $this->con = parent::getConnection();
    }
    
    function insertPreference($nameID, $allotmentID) {
        $sql = "insert into preference (nameID, allotmentID) VALUES ('$nameID','$allotmentID')";
        $this->con->query($sql);
    }
    
    function getPreferenceByID($id) {
        $this->query = "select allotmentID from preference where nameID = '$id'";
        $preferenceObject =  $this->con->query($this->query);
        $preferenceList = array();
        if($preferenceObject->num_rows>0) {
            while ($row = $preferenceObject->fetch_assoc()) {
                $preferenceList[] = $row['allotmentID'];
            }
        }
        return $preferenceList;
    }
}

?>