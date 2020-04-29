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
    <head>
        <title>Bishop MUN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <h1 style="background-color: blueviolet; padding:1.5em;">The Bishop's Model United Nation</h1>
        
        <div class="container" align="center">
            <div class="row">
                <div class="col-9"></div>
                <div class="col-3">
                    <form  action="index.php" method="get">
                        <input type="submit" value="Logout" name="logout" class="btn"/>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h4>Security</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input id="securityInput" type="text"/>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <h4 id="userDetails"></h4>
                </div>
            </div>
        </div>

        <script src="jQuery.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="script.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                
            });
        </script>

        <footer>
        </footer>
    </body>
</html>