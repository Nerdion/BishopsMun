<?php

include_once 'Names.php';

$names = new Names();

if(isset($_POST['resendMail'])) {
    //getting user information
    $names->resendMail($_POST['userID']);
}
?>