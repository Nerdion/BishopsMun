<?php 

include_once 'allotment.php';
include_once 'Names.php';
include_once 'Backup.php';
include_once 'Notifications.php';

if(isset($_POST['countryAllotment'])) {
    $subject = "Allotment - The Bishop's MUN";
    session_start();
    $data = $_POST['nameID'];
    
    $allotment = new Allotment();
    $backup = new Backup();
    
    if($allotment->checkNameIDisNULL($_POST['countryAllotment']) == 1) {
        
        $allotment->assignDelegate($_POST['countryAllotment'],$_POST['nameID']);
        $backup->backupAllot($_POST['nameID'], $_POST['countryAllotment']);
        
        $names = new Names();
        $names->assignDelegate($_POST['nameID']);
        $allotment->notifyAllotmentMail($_POST['nameID'], $_POST['countryAllotment'], $subject);
        header("Location: ../index.php");
    } else {
        echo "<script type=\"text/javascript\"> alert(\"Already Alloted ! Cannot allot\");</script>";
    }
    
    
}

if(isset($_POST['changedNewAllotment'])) {
    $subject = "Revised Allotments";
    session_start();
    $allotment = new Allotment();
    $backup = new Backup();
    if($allotment->checkNameIDisNULL($_POST['changedNewAllotment'])  == 1) {
        $allotment->changeDelegateAllotment($_POST['nameID'], $_POST['oldAllotment'], $_POST['changedNewAllotment']);
        $backup->backupAllot($_POST['nameID'], $_POST['changedNewAllotment']);
        $allotment->notifyAllotmentMail($_POST['nameID'], $_POST['changedNewAllotment'], $subject);
        header("Location: ../index.php");
    } else {
        echo "<script type=\"text/javascript\"> alert(\"Already Alloted from update! Cannot allot\");</script>";
    }
}

if(isset($_POST['notification'])) {
    $notify = new Notifications();
    $notify->insertNotification($_POST['message']);
    header("location: ../index.php");
}
?>