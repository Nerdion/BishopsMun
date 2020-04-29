<?php

include_once 'Attendance.php';
include_once '../actions/Committees.php';

$attendance = new Attendance();

if(isset($_POST['getEvents'])) {
    $data = $attendance->getEvents();
    echo json_encode($data);
}

if(isset($_POST['seeConfiscated'])) {
    $response = $attendance->getConfiscatedID($_POST['userID']);
    echo json_encode($response);
}

if(isset($_POST['insertNewAttendance'])) {
    $response = $attendance->insertData($_POST['userID'],$_POST['eventID']);

    if($response == 1) {
        echo 1;
    } else {
        echo -1;
    }
}

if(isset($_POST['details'])) {
    $data = $attendance->getDetailsByID($_POST['insertionID']);
    echo json_encode($data);
}

if(isset($_POST['committeeList'])) {
    $committees = new Committees();
    $data = $committees->getCommitteesList();
    echo json_encode($data);
}

if(isset($_POST['getAttendance'])) {
    if($_POST['getAttendance'] == 1) {
        $data = $attendance->seeAttendance($_POST['eventID'],$_POST['committeeName']);
    } else if($_POST['getAttendance'] == 2) {
        $data = $attendance->seeAbsentism();
    }
    echo json_encode($data);
}

if(isset($_POST['confiscatedItems'])) {
    $attendance->insertConfiscated($_POST['confiscatedUserID'], $_POST['confiscatedItems']);
    echo json_encode("confiscated something");
}

if(isset($_POST['getAllData'])) {
    $aa = new Attendance();
    $result = $aa->getAllDetails();
    print_r($result);
}
?>