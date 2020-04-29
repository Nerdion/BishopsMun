<?php

include_once 'Names.php';

$names = new Names();
//sendMail(subject, message,mail,name)
//$names->sendMail("Hello World","Hello World message","neel99khalade@gmail.com","");

if(isset($_POST['sendAllMail'])) {
    $infoArray = $names->getAllNamesAndMails();
    
    foreach ($infoArray as $record) {
        $names->sendMail($_POST['subject'], $_POST['message'],$record['mail1'],$record['fullName']);
    }

    header("location: ../index.php");
}

?>