<?php
    session_start();
    if(!isset($_SESSION['volunteerLogin'])) {
        header("location: volunteerLogin.php");
    }

    if(isset($_GET['logout'])) {
        unset($_SESSION['volunteerLogin']);
        header("location: volunteerLogin.php");
    }
?>

<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>The Bishop's MUN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="nice-select.css">
        <link rel="shortcut icon" type="image/ico" href="others/favicon.ico">
    </head>
    <body background:"">
        <h1 style="background-image: url('others/userback.jpg'); padding:1.5em; color:white">The Bishop's Model United Nation</h1>
        
        <div class="container" align="center">
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3">
                    <form  action="index.php" method="get">
                        <input type="submit" value="Logout" name="logout" class="btn"/>
                    </form>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col">
                <h4>Select Event-</h4>
                </div>
                <div class="col">
                    
                    <select id="dropdown" >
                        <option selected value=''></option>
                    </select>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col" id="securityConfiscate">
                    
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input id="barcodeInput" type="text" placeholder="Scan here.."/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <h4 id="userDetails"></h4>
                </div>
                <div class="col confiscatedID">
                </div>
            </div>
            <div class="row">
                <div class="col" id="alreadyAttended">
                </div>
            </div>
        </div>

        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="jquery.nice-select.js" type="text/javascript"></script>
        <script src="script.js" type="text/javascript"></script>
       
        <script type="text/javascript"> 
            $(function() {
                
            });
        </script>

        <footer>
        </footer>
    </body>
</html>