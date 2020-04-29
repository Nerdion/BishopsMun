<?php 
include_once 'actions/Committees.php';
include_once 'actions/Allotment.php';
include_once 'actions/Names.php';
include_once 'actions/fileHandling.php';

session_start();
if(!isset($_SESSION['adminLogin'])) {
    header("location: userLogin.php");
}

$names = new Names();
$committees = new Committees();
$allotment = new Allotment();
// $countries = new Countries();
// $countriesList = $countries->getCountriesList();

if(isset($_GET['logout'])) {
    unset($_SESSION['adminLogin']);
    header("location: http://thebishopsmun.org/");
}


?>

<!doctype html>
<html>
    <head>
        <title>Delegate Management System</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/prism.css">
        <link rel="stylesheet" href="css/chosen.css">
        <link rel="shortcut icon" type="image/ico" href="images/favicon.ico">

      </head>
    
    <body>

        <script type="text/javascript"
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="js/chosen.jquery.min.js" type="text/javascript"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      
      <script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
      <script src="js/init.js" type="text/javascript" charset="utf-8"></script>
        

<nav style="background-color: #e3f2fd;"  class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Bishop's MUN Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>-->
    </ul>
    <span class="navbar-text">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item" style="margin-right: 1em">
      	 <h4><?php echo $_SESSION['adminLogin']?></h4>
      </li>
      <li class="nav-item">
      	<form  action="head.php" method="get">
    		<input type="submit" value="Logout" name="logout" class="btn btn-primary"/>
    	</form>
      </li>
      </ul>	
    </span>
  </div>
</nav>