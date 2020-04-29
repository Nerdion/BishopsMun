<?php 

include_once 'config.php';
include_once 'Names.php';
include_once 'Backup.php';


class FileHandling extends Database {
    protected  $query;
    protected $result;
    protected $con;
    
    function __construct() {
        $this->con = parent::getConnection();
    }
    
    function insertCountries() {
        $record = file("../files/countriesList.csv", FILE_IGNORE_NEW_LINES);
        $record = array_map('trim', $record);
        $record = array_map("utf8_encode", $record);
        $this->query = "INSERT into countries (name) VALUES ";
        
        
        for($i=0; $i<sizeof($record)-1; $i++) {
            $record[$i] = $this->con->real_escape_string($record[$i]);
            $this->query .= "('".$record[$i]."'), ";
        }
        
        $record[$i] = $this->con->real_escape_string($record[$i]);
        
        $this->query .= "('".$record[sizeof($record)-1]."'); ";
        
        print_r($this->query);
        
        if ($this->con->query($this->query) === TRUE) {
            echo "Inserted country pref";
        } else {
            echo "Error: " . $this->query . "<br>" . $this->con->error;
        }
    }
    
    function insertAllocationMatrix($committeeName, $filename) {
        $queryCommitteeId = "select id from committee where name = '$committeeName' limit 1" ;
        $committeeID = $this->con->query($queryCommitteeId);
        $committeeID = $committeeID->fetch_assoc();
        $committeeID = $committeeID['id'];
        print_r($committeeID);
        
        //reading the committee file
        $record = file($filename, FILE_IGNORE_NEW_LINES);
        $record = array_map("utf8_encode", $record);
        $record = array_map('trim', $record);
        
        $queryInsertAllotment = "insert into allotment(orgID, country) VALUES ";
        
        //escaping the string
        for($i=0; $i<sizeof($record)-1; $i++) {
            $record[$i] = $this->con->real_escape_string($record[$i]);
            $queryInsertAllotment .= "('$committeeID','". $record[$i]."'), ";
        }
        $record[sizeof($record)-1] = $this->con->real_escape_string($record[sizeof($record)-1]);
        $queryInsertAllotment .= "('$committeeID','". $record[sizeof($record)-1]."'); ";
        print_r($queryInsertAllotment);
        
        if ($this->con->query($queryInsertAllotment) === TRUE) {
            echo "Inserted countries in allotment";
        } else {
            echo "Error: " . $queryInsertAllotment . "<br>" . $this->con->error;
        }
        
    }
    
    public function outputCsv($assocDataArray, $fileName = 'content.csv')
    {
        ob_clean();
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename=' . $fileName);
        if(isset($assocDataArray['0'])){
            $fp = fopen('php://output', 'w');
            fputcsv($fp, array_keys($assocDataArray['0']));
            foreach($assocDataArray AS $values){
                fputcsv($fp, $values);
            }
            fclose($fp);
        }
        ob_flush();
    }
    
    public function readTownScript($filename) {
        session_start();
        $backup = new Backup();
        $names = new Names();
        //$record = file($filename, FILE_IGNORE_NEW_LINES);
        
        $recordArray = array();
        
        /*for( $i=1; $i < sizeof($record); $i++) {
            $recordArray[$i][] = explode(",",$record[$i]);
        }*/
        $file = fopen($filename, 'r');
        
        while (($lineOfCSV = fgetcsv($file)) !== FALSE) {
            //$line is an array of the csv elements
            $recordArray[] = $lineOfCSV;
        }
        

        for($i=1; $i<sizeof($recordArray); $i++) {
            $insertQuery = "insert into names (fullName, password, mail1, ph1, class, institution, priorMUN, cm1, co1, cm2, co2, cm3, co3, pFrom) VALUES ";
            $record = [];
            $flag = -1;
            $line = array();
            
            foreach($recordArray[$i] as $lineescape) {
                $line[] = mysqli_real_escape_string($this->con, $lineescape);
            }
            
            print_r($line[12]);
            
            $checkQuery = "select id from names where mail1 = '". $line[12] ."'";
            echo $checkQuery;
            $result = $this->con->query($checkQuery);
            
            if($result->num_rows > 0) {
                $flag=0;
            } else{
                $flag=1;
            }

            if($flag == 1) {
                $record['fullName'] = $line[11];
                $record['mail1'] = $line[12];
                $record['ph1'] = $line[13];
                $record['institution'] = $line[14];
                $record['class'] = $line[15];
                $record['priorMUN'] = $line[16];
                $record['cm1'] = $line[17];
                $record['co1'] = $line[18];
                $record['cm2'] = $line[19];
                $record['co2'] = $line[20];
                $record['cm3'] = $line[21];
                $record['co3'] = $line[22];
                $record['pForm'] = 1;
                $record['password'] = $names->randomPassword();
                
                $insertQuery .= "(
                '". $record['fullName']."',
                '". $record['password']."',
                '". $record['mail1']."',
                '". $record['ph1']."',
                '". $record['class']."',
                '". $record['institution']."',
                '". $record['priorMUN']."',
                '". $record['cm1']."',
                '". $record['co1']."',
                '". $record['cm2']."',
                '". $record['co2']."',
                '". $record['cm3']."',
                '". $record['co3']."',
                '". $record['pForm']."'
                )";
                
                $mailBody = "<p>Dear" .$record['fullName'] .",<br>I am pleased to welcome you as a delegate of <strong> The Bishop`s Model United Nations Conference Third Edition</strong> organised in collaboration with the UN Information Centre for India and Bhutan. It is an honour to have you on board for this conference in line with the procedure of the United Nations.<br><br> As part of this induction email, I once again <strong>re-iterate</strong> your registration with The Bishop`s Model UN conference there by confirming the receipt of your registration amount. For your convenience and our formal procedure, we would like you to take note that the <strong>registration amount is a one-time non-refundable sum</strong> towards your participation in the conference which excludes your accommodation, travel expenditure and any other contingent expense which you might incur in your run up to and during the conference.<br><br> Subject to the prior, we are happy to inform you as a matter of your right that your registration with us is inclusive of Lunch and High Tea on 14th and15th of December, State Dinner on the 14th of December, a delegate kit and training sessions for conference preparation. <br><br> Please use the below details to log in to your Delegate Home Page. The Delegate Home Page can be accessed by visiting www.thebishopsmun.org and clicking on the `Login` button. Your allotment will also be available here within 2 weeks from now.<br><br>Login ID : ".$record['mail1']." <br>Password : ".$record['password']." <br><br><br>Regards,<br>Sahil Nahar<br>Founder and President<br>The Bishop`s Model United Nations<br>Helpline Number : 9049188991 </p>";
                $body = mysqli_real_escape_string($this->con, $mailBody);
            
                echo $body;
            
                $names->sendMail("Registration and Login Details For Bishop`s MUN", $body, $record['mail1'], $record['fullName']);

                print_r($record);
        
                $backup->backupTownscript($record);
                
                if ($this->con->query($insertQuery) === TRUE) {
                    echo "successfully";
                } else {
                    echo "Error: " . $insertQuery . "<br>" . $this->con->error;
                }
               // $message = "Welcome to The Bishop`s MUN. Your registration is being processed. Please refer your email for login details. Visit www.thebishopsmun.org to login.";
               // $names->sendSMS($record['ph1'],$message);

            }
        }
    }
}

//$testing = new FileHandling();
//$testing->insertCountries();
//$testing->insertAllocationMatrix("WHO","WHO.csv");

?>