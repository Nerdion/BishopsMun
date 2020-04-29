<?php 

include_once 'Allotment.php';
include_once 'Committees.php';
include_once 'Names.php';



if ($_POST['committee']){
    $allotment = new Allotment();
    $countryData = $allotment->getCountryByCommitte($_POST['committee']);
    echo json_encode($countryData);
}






?>