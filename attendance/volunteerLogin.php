<?php
    include_once 'Attendance.php';

    $attendance = new Attendance();
    if(isset($_POST['mail1'])) {
        $result = $attendance->volunteerLogin($_POST['mail1'],$_POST['password']);
    
        if($result == 'y') {
            header("location: index.php");
        } else if($result == 'er'){
            $error = 1;
        }
    }
?>
<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Delegate Management System</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/ico" href="others/favicon.ico">
      </head>

    <body>
      <style rel="stylesheet" type="text/css">
        html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        }

        body {
        background-position: center center;
        background-attachment: fixed;
        background-repeat: repeat;
        background-size: cover;
        }

        .loginCol {
          margin-top: 150px;
        }
      </style>
    	 <script type="text/javascript"
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

        <script src="js/jquery.chocolate.js"></script>

        <div class="container text-center">
        	<div class="row">
        		<div class="col-4">
        		</div>
        		<div class="col">
                <div class="loginCol">
                	<form class="form-signin" method="post" action="volunteerLogin.php">
                	<br>
                	<br>
                	<h1 style="color: black;  font-weight: bold; text-shadow : 4px 3px 4px #fff; font-size:50px; border-style: solid; border-width: 5px; border-color: #000"  class="h3 mb-3">VOLUNTEER LOGIN</h1>
                      <br>
                      <label for="inputEmail" class="sr-only">Email address</label>
                      <input name="mail1" type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                      <br>
                      <label for="inputPassword" class="sr-only">Password</label>
                      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                      <br>
                      <?php if(isset($error)) {
                      echo '<p class="text-danger">please check your username and password</p>';
                      }?>
                      <button name="login" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                      <p class="mt-5 mb-3 text-muted">&copy; 2019-20</p>
                    </form>
                  </div>
        		</div>
        		<div class="col-4">
        		</div>
        	</div>
        </div>

        <script type="text/javascript">
        </script>
     </body>
</html>
