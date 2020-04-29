<?php

include_once 'config.php';
include_once 'Committees.php';
include_once 'Names.php';

class Allotment extends Database {
    protected $con;
    protected $query;

    function __construct() {
        $this->con = parent::getConnection();
    }

    function getCountryByCommitte($committeeID) {
        $queryGetCountry = "select id, country from allotment where orgID = '$committeeID' and nameID is NULL";

        $countriesObject = $this->con->query($queryGetCountry);

        $countriesByCommitteeList = array();

        if($countriesObject->num_rows > 0) {
            while($row = $countriesObject->fetch_assoc()) {
                $countriesByCommitteeList[] = $row;
            }
        }

        return $countriesByCommitteeList;
    }

    function getAllotmentDetailsByID($id) {
        $this->query = "SELECT * from allotment where id= '$id' limit 1";
        $allotmentObject =  $this->con->query($this->query);
        $allotmentObject = $allotmentObject->fetch_assoc();
        return $allotmentObject;
    }

    function getAllotmentDetailsByNameID($nameID) {
        $this->query = "SELECT * from allotment where nameID= '$nameID' limit 1";
        $allotmentObject =  $this->con->query($this->query);
        $allotmentObject = $allotmentObject->fetch_assoc();
        return $allotmentObject;
    }

    function checkNameIDisNULL($id) {
        $sql = "select count(id) from allotment where id = '$id' and nameID is null";
        $result = $this->con->query($sql);
        $result = $result->fetch_assoc();
        print_r($result['count(id)']);
        return $result['count(id)'];
    }

    function assignDelegate($id, $nameID) {

        $sql = "update allotment set nameID= " .$nameID. " where id = ".$id;
        if ($this->con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
    }

    function delegateAllotmentByCommittee($committeeID) {
        $sql = "select * from allotment where orgID = '$committeeID' and nameID is NOT NULL";

        $allotmentObject = $this->con->query($sql);

        $allotmentListByCommittee = array();
        if($allotmentObject->num_rows > 0) {
            while($row = $allotmentObject->fetch_assoc()) {
                $allotmentListByCommittee[] = $row;
            }
        } else {
            $allotmentListByCommittee = NULL;
        }
        return $allotmentListByCommittee;

    }

    function changeDelegateAllotment($nameID, $oldAllotmentID, $newAllotmentID) {
        //print_r($oldAllotmentID);
        $sql = "update allotment set nameID = NULL where id =". $oldAllotmentID;
        if ($this->con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }

        $this->assignDelegate($newAllotmentID, $nameID);
    }

    function notifyAllotmentMail($id, $allotmentID, $subject) {

        $names = new Names();
        $committees = new Committees();
        $allotment = $this->getAllotmentDetailsByID($allotmentID);
        $country = $allotment['country'];
        $committee = $committees->getCommitteeNameByID($allotment['orgID']);

        $data = $names->getInfoById($id);

        $mailBody = "<p>Dear ".$data['fullName'].",<br> I am pleased to forward to you the country and committee allocation for <strong>The Bishop`s Model United Nations Conference Third Edition</strong> organised in collaboration with the <strong>UN Information Centre for India and Bhutan</strong>. It is an honour to have you on board for this conference in line with the procedure of the United Nations.<br><br>As part of this induction email, I once again <strong>re-iterate</strong> your registration with The Bishop`s Model UN conference there by confirming the receipt of your registration amount. For your convenience and our formal procedure, we would like you to take note that the <strong>registration amount is a one-time non-refundable </strong>sum towards your participation in the conference which excludes your accommodation, travel expenditure and any other contingent expense which you might incur in your run up to and during the conference.<br><br>Subject to the prior, we are happy to inform you as a matter of your right that your registration with us is inclusive of Lunch and High Tea on 14th and15th of December, State Dinner on the 14th of December, a delegate kit and training sessions for conference preparation.<br><br>Please login to your Delegate Home Page for further details. The Delegate Home Page can be accessed by visiting www.thebishopsmun.org and clicking on the `Login` button.<br><br><br><br><br>Committee : ".$committee."<br><br>Country : ".$country."<br><br><br><br>Please write to us at info@thebishopsmun.org for any doubts or queries.<br><br><br>Regards,<br>Sahil Nahar<br>Founder and President<br>The Bishop`s Model United Nations<br>Helpline Number : 9049188991 </p>";

        $body = mysqli_real_escape_string($this->con, $mailBody);

        echo $body;

        $names->sendMail($subject,$body,$data['mail1'],$data['fullName']);
      // $message = "Dear ".$data['fullName'].", Your allocation has been processed. Please refer your email. Visit the Login Page for further information. Study material is also available now." ;
      //  $names->sendSMS($data['ph1'],$message);

    }
}

//$testing = new Allotment();
//$testing->getCountryByCommitte(3);
//$testing->notifyAllotmentMail(1, 1, 1);
?>
