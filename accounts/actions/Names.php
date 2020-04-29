<?php

include_once 'config.php';
include_once 'Preference.php';
include_once 'Backup.php';
include_once 'Allotment.php';
include_once 'Committees.php';


class Names extends Database {
    protected  $query;
    protected $result;
    protected $con;
    public $mailBody;
    public $namesList;

    function __construct() {
        $this->con = parent::getConnection();
    }

    function getNamesList() {
        $this->namesList = array();
        $this->query = "SELECT * from names";
        $this->result =  $this->con->query($this->query);
        if($this->result->num_rows > 0) {
            while($row = $this->result->fetch_assoc()) {
                $this->namesList[] = $row;
            }
        }
        return $this->namesList;
    }

    function getInfoById($id) {
        $this->query = "SELECT * from names where id= '$id' limit 1";
        $personInfo =  $this->con->query($this->query);
        $personInfo = $personInfo->fetch_assoc();

        return $personInfo;
    }

    function getNameById($id) {
        $this->query = "SELECT fullName from names where id= '$id'";
        $name = $this->con->query($this->query);
        $name = $name->fetch_assoc();
        return $name['fullName'];
    }

    function getAllNamesAndMails() {
        $this->query = "SELECT fullName, mail1 from names";

        $result = $this->con->query($this->query);

        if($result->num_rows > 0) {
            $returnArr = array();
            while($row = $result->fetch_assoc()) {
                $returnArr[] = $row;
            }
            return $returnArr;
        }
    }
    
    function getClassbyId($id){
        $this->query = "SELECT class from names where id= '$id'";
        $name = $this->con->query($this->query);
        $name = $name->fetch_assoc();
        return $name['class'];
    }

    function insertNewData($data) {
        $preference = new Preference();

        $sql = "INSERT INTO names (fullName,password,mail1,mail2,ph1,ph2,class,institution,priorMUN) VALUES (
                '". $data['fullName']."',
                '". $data['password']."',
                '". $data['mail1']."',
                '". $data['mail2']."',
                '". $data['ph1']."',
                '". $data['ph2']."',
                '". $data['class']."',
                '". $data['institution']."',
                '". $data['priorMUN']."'
         )";

        if ($this->con->query($sql) === TRUE) {
            echo "record created ";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }

        $query = "SELECT id from names where mail1 = '". $data['mail1']."'";
        $result =  $this->con->query($query);

        $nameID = NULL;
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $nameID = $row['id'];
        } else {
            echo "found more than 1 error";
        }

        foreach ($data['pref'] as $allotmentID) {
            $preference->insertPreference($nameID, $allotmentID);
        }

        $body = "<p>Dear ".$data['fullName'].",<br>I am pleased to welcome you as a delegate of <strong> The Bishop's Model United Nations Conference Third Edition</strong> organised in collaboration with the UN Information Centre for India and Bhutan. It is an honour to have you on board for this conference in line with the procedure of the United Nations.<br><br> As part of this induction email, I once again <strong>re-iterate</strong> your registration with The Bishop's Model UN conference there by confirming the receipt of your registration amount. For your convenience and our formal procedure, we would like you to take note that the <strong>registration amount is a one-time non-refundable sum</strong> towards your participation in the conference which excludes your accommodation, travel expenditure and any other contingent expense which you might incur in your run up to and during the conference.<br><br> Subject to the prior, we are happy to inform you as a matter of your right that your registration with us is inclusive of Lunch and High Tea on 14th and15th of December, State Dinner on the 14th of December, a delegate kit and training sessions for conference preparation. <br><br> Please use the below details to log in to your Delegate Home Page. The Delegate Home Page can be accessed by visiting www.thebishopsmun.org and clicking on the `Login` button. Your allotment will also be available here within 2 weeks from now.<br><br>Login ID : ".$data['mail1']." <br>Password : ".$data['password']." <br><br><br>Regards,<br>Sahil Nahar<br>Founder and President<br>The Bishop`s Model United Nations<br>Helpline Number : 9049188991 </p>";

        $this->mailBody = mysqli_real_escape_string($this->con, $body);

        echo $body;

        $this->sendMail("Registration and Login Details For Bishop`s MUN", $body, $data['mail1'], $data['fullName']);
        //$message = "Welcome to The Bishop`s MUN. Your registration is being processed. Please refer your email for login details. Visit www.thebishopsmun.org to login.";
        //echo "here";
        //$this->sendSMS($data['ph1'], $message);

        echo "done everything";

    }

    function assignDelegate($id) {
        $sql = "update names set status= 1 where id = ".$id;
        if ($this->con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }
    }

    function updateInfoByID($newData) {
        //$oldData = $this->getInfoById($id);
        $backup = new Backup();
        $sql = "update names set fullName=
                '".$newData[1]."',
                 mail1 = '". $newData[2]."',
                 mail2 = '".$newData[3]."',
                ph1 = '".$newData[4]."',
                ph2 = '".$newData[5]."',
                class = '".$newData[6]."',
                institution = '".$newData[7]."',
                priorMUN = '".$newData[8]."'
                where id = ". $newData[0];

        if ($this->con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->con->error;
        }

        $backup->backupNames($newData[0]);
    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    function checkLogin($username, $password) {
        session_start();
        $loginQuery = "select id,fullName from names where mail1 = '$username' and password = '$password' ;";
        $adminQuery = "select id,name from admin where username = '$username' and password = '$password'";
        $resultObject = $this->con->query($loginQuery);

        if($resultObject->num_rows == 1) {
            //delegate login
           $statusD = $resultObject->fetch_assoc();
           $status = $statusD['id'];
           $_SESSION['userLogin'] = $statusD['id'];
           header("location: myProfile/index.php");
        } else {
            $status=0;
            $adminObject = $this->con->query($adminQuery);
            if($adminObject->num_rows == 1) {
                //admin login
                $statusD = $adminObject->fetch_assoc();
                $status = $statusD['id'];
                $_SESSION['adminLogin'] = $statusD['name'];
                header("location: index.php?id=$status");
            } else {
                //if login fails
                header("location: userLogin.php?er=$status");
            }
        }
    }

    function adminAttendanceLogin($username, $password) {
        session_start();
        $status=0;
        $adminQuery = "select id,name from admin where username = '$username' and password = '$password'";
        $adminObject = $this->con->query($adminQuery);
        if($adminObject->num_rows == 1) { 
            $statusD = $adminObject->fetch_assoc();
            $status = $statusD['id'];
            $_SESSION['adminLogin'] = $statusD['name'];
            header("location: ../attendance/viewAttendance.php?id=$status");
        } else {
            header("location: ../attendance/viewAttendance.php?er=$status");
        }
    }

    function getAdminName($id) {
        $query = "select name from admin where id = '$id'";
        $result = $this->con->query($query);
        $result = $result->fetch_assoc();
        return $result['name'];
    }

    function getIDnewRecord($mailID) {
        $query = "SELECT id from names where mail1 = '". $mailID ."'";
        $result =  $this->con->query($query);
        $result = $result->fetch_assoc();
        return $result['id'];
    }

    function generateBackupData() {
        $committees = new Committees();
        $allotment = new Allotment();

        $sql = "select * from backup";
        $this->result = $this->con->query($sql);

        $data = array();
        if($this->result->num_rows > 0) {
            while($row = $this->result->fetch_assoc()) {
                $qAdminName = "select name from admin where id='". $row['adminID']."'";
                $adminName = $this->con->query($qAdminName);
                $adminName = $adminName->fetch_assoc();
                $row['adminID'] = $adminName['name'];

                if($row['allotmentID'] == 0) {
                    $row['committee'] = "-";
                    $row['country'] = "-";
                } else {
                    $allot = $allotment->getAllotmentDetailsByID($row['allotmentID']);
                    $orgName = $committees->getCommitteeNameByID($allot['orgID']);
                    $row['committee'] = $orgName;
                    $row['country'] = $allot['country'];
                }

                $data[] = $row;
            }
        }
        return $data;
    }

    function escapeString($data) {
        $eData = array();
        foreach ($data as $value) {
            $eData[] = mysqli_real_escape_string($this->con, $value);
        }
        return $eData;
    }

    function changePassword($id, $oldpass, $newPass) {
        $query = "select password from names where id = '$id'";
        $password = $this->con->query($query);
        $password = $password->fetch_assoc();
        $password = $password['password'];

        if($oldpass == $password) {
            $changeQuery = "update names set password = '$newPass' where id='$id'";
            if ($this->con->query($changeQuery) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $changeQuery . "<br>" . $this->con->error;
            };
            return 1;
        } else {
            return 0;
        }


    }

    function resendMail($userID) {
        $sql = "select names.fullName, names.password, names.mail1, allotment.country, committee.name
        from names inner join allotment inner join committee where allotment.orgID = committee.id and names.id = allotment.nameID and names.id = '$userID';";

        $result = $this->con->query($sql);
        $data = $result->fetch_assoc();

        
        $body = "<p>Dear ".$data['fullName'].",<br>I am pleased to welcome you as a delegate of <strong> The Bishop's Model United Nations Conference Third Edition</strong> organised in collaboration with the UN Information Centre for India and Bhutan. It is an honour to have you on board for this conference in line with the procedure of the United Nations.<br><br> As part of this induction email, I once again <strong>re-iterate</strong> your registration with The Bishop's Model UN conference there by confirming the receipt of your registration amount. For your convenience and our formal procedure, we would like you to take note that the <strong>registration amount is a one-time non-refundable sum</strong> towards your participation in the conference which excludes your accommodation, travel expenditure and any other contingent expense which you might incur in your run up to and during the conference.<br><br> Subject to the prior, we are happy to inform you as a matter of your right that your registration with us is inclusive of Lunch and High Tea on 14th and15th of December, State Dinner on the 14th of December, a delegate kit and training sessions for conference preparation. <br><br> Please use the below details to log in to your Delegate Home Page. The Delegate Home Page can be accessed by visiting www.thebishopsmun.org and clicking on the `Login` button. Your allotment will also be available here within 2 weeks from now.<br><br>Login ID : ".$data['mail1']." <br>Password : ".$data['password']." <br> <br>Committee : ".$data['name']."<br>Country : ".$data['country']."<br><br><br>Regards,<br>Sahil Nahar<br>Founder and President<br>The Bishop`s Model United Nations<br>Helpline Number : 9049188991 </p>";
        $this->sendMail("The Bishop`s MUN details", $body, $data['mail1'], $data['fullName']);

        print_r($body);
    }



    function sendMail($subject, $body, $email, $name) {
        // $email = "overthinkernerdion@gmail.com";
        // $name = "Neel S Khalade";
        // $body = "My new mail, this is a mail from coding";
        // $subject = "Subject of mail";

        $from = "admin@thebishopsmun.org";
        $adminname = "The Bishop`s Model United Nations";

        $headers = array(
            'Authorization: Bearer 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',
            'Content-Type: application/json'
        );

        $data = array(
            "nickname" => $adminname,
            "personalizations"=> array(
                array(
                    "to"=>array(
                        array(
                            "email"=> $email,
                            "name"=> $name
                        )
                    )
                )
            ),

            "from" => array(
                "email" => $from,
                "name" => $adminname
            ),
            "subject"=> $subject,
            "content" => array(
                array(
                    "type" => "text/html",
                    "value" => $body
                )
            )
        );


        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL,"https://api.sendgrid.com/v3/mail/send" );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;

        //phpinfo();
    }

  /*  function sendSMS($phone, $message) {
        $phone = urlencode($phone);
        $message = urlencode($message);
        //$message = urlencode("does it even work");// urlencode your message
        $key1 = urlencode('NG7DJ9PN1FCQ81XMB658OU58A0PVRW7V');  //public key
        $key2 = urlencode('BL7OXLK2I3IXNOV5');//private key
        $usetype = urlencode('prod'); // stage for testing, prod for live
        //$phone = urlencode('9049188991'); // receiver ph no
        $senderid = urlencode("TBMUNC"); // sender id


        $curl = curl_init();
        // set url
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_URL, "https://www.way2sms.com/api/v1/sendCampaign/?apikey=$key1&secret=$key2&usetype=$usetype&senderid=$senderid&phone=$phone&message=$message");

        // query parameter values must be given without square brackets
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;

    }*/
    
}

if(isset($_POST['data'])) {
    insertNewData();
}

function insertNewData() {
    session_start();
    $backup = new Backup();
    $names = new Names();
    $names->insertNewData($_POST['data']);
    print_r($_POST['data']);
    $nameID = $names->getIDnewRecord($_POST['data']['mail1']);
    $backup->backupNames($nameID);
    header("Location: ../index.php");
}

if(isset($_POST['cdata'])) {
    updateInfo();
}

function updateInfo() {
    session_start();
    $names = new Names();
    $backup = new Backup();
    print_r($_POST['cdata']);

    $data= $names->escapeString($_POST['cdata']);
    print_r($data);
    $names->updateInfoByID($data);
    header("Location: ../index.php");
}
?>
