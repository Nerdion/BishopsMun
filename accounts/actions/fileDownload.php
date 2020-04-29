<?php

include_once 'Names.php';
include_once 'Preference.php';
include_once 'fileHandling.php';

if(isset($_POST['namesListCSV'])) {
    $names = new Names();
    $fileHandling = new FileHandling();
    
    $namesList = $names->getNamesList();
    $fileHandling->outputCsv($namesList);
    
}

/*
if(isset($_POST['committeeDetailsCSV'])) {
    $fileHandling = new FileHandling();
    $filename = $_POST['committeeName'];
    $fileHandling->outputCsv($_POST['committeeAllotmentDetails'],$filename . '.csv');
}*/


if(isset($_POST['committeeDetailsCSV'])) {
    
    $fileHandling = new FileHandling();
    $filename = $_POST['committeeName'];
    $data = $_POST['committeeDetails'];
    print_r($data);
    
    
    $mydata = array();
    
    for($i=0; $i < sizeof($data); $i++) {
        $mydata[$i]['srno'] = $data['srno'][$i];
        $mydata[$i]['country'] = $data['country'][$i];
        $mydata[$i]['committee'] = $data['committee'][$i];
    }
    
    print_r($mydata);
    $fileHandling->outputCsv($mydata, $filename . '.csv');
}

if(isset($_POST['downloadBackup'])) {
    $fileHandling = new FileHandling();
    $names = new Names();
    $filename = "backup";
    $data = $names->generateBackupData();
    $fileHandling->outputCsv($data);
}
?>