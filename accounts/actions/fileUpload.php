<?php

//echo "Hello";
include_once 'fileHandling.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// Check if image file is a actual image or fake image

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

$fileHandling = new FileHandling();
$fileHandling->readTownScript($target_file);

unlink($target_file);

header("location: ../");

?>