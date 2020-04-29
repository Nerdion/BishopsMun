<?php 
//echo 'Hello';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mun_att";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = $_POST['userID'];

$sql = "INSERT into test (userID) VALUES ('$data')";

if ($conn->query($sql) === TRUE) {
    echo "$data" . " inserted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
