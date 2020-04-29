<?php

include_once 'actions/config.php';

print_r($_POST);


class UserRegistration extends Database {
    protected  $query;
    protected $result;
    protected $con;

    function __construct() {
        $this->con = parent::getConnection();
    }

    function newRegistration($name,$email) {
        $sql = "insert into emaildb (name, email) values ('$name', '$email')";
        $this->con->query($sql);
    }
}


$name = $_POST['name'];
$email = $_POST['email'];
$userRegistration = new UserRegistration();
$userRegistration->newRegistration($name, $email);

?>