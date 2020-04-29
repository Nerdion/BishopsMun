<?php

include_once '../actions/Names.php';
include_once '../actions/Allotment.php';
include_once '../actions/Committees.php';
include_once '../actions/Notifications.php';
session_start();

if(!isset($_SESSION['userLogin'])) {
    header("location: ../userLogin.php");
}


$names = new Names();
$allotment = new Allotment();
$committee = new Committees();

$data = $names->getInfoById($_SESSION['userLogin']);

$userAllotment = $allotment->getAllotmentDetailsByNameID($data['id']);
$committeeName = $committee->getCommitteeNameByID($userAllotment['orgID']);

if(isset($_GET['logout'])) {
    unset($_SESSION['userLogin']);
    header("location: http://thebishopsmun.org/");
}

if(isset($_POST['changePassword'])) {
    $names = new Names();
    
    if($_POST['newpass1'] == $_POST['newpass2']) {
        $result = $names->changePassword($_POST['id'], $_POST['oldpass'], $_POST['newpass1']);
        
        if($result == 1) {
            echo "<script>alert('Change successful!');</script>";
        } else {
            echo "<script>alert('Check your credentials');</script>";
        }
    } else {
        echo "<script>alert('check new passwords');</script>";
    }
    
}

?>

<!doctype html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Delegate Management System</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/prism.css">
        <link rel="shortcut icon" type="image/ico" href="images/favicon.ico">
      </head>
    
    <body background="../css/userback.jpg" style="color:white;">

        <script type="text/javascript"
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="js/chosen.jquery.min.js" type="text/javascript"></script>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <div class="container" >
        	<div class="row">
        		<div class="col">
        			
        		</div>
        		<div class="col" align="right" >
        		
                	<form action="index.php" method="get">
                		<br>
                		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Change Password</button>
                		<input class="btn btn-warning btn-md" type="submit" name="logout" value="Logout"/>
                	</form>
                </div>
        	</div>
        	<div class="row" style="margin-top:50px; margin-bottom:30px; height:600px;">
        		<div class="col-8" style="padding-top:30px;">
        			<br><br>
        			<div class="container " style="">
                    	<div class="row ">
                    		<div class="col">
                    			<p id="name" style="font-size:75px;"><?php echo $data['fullName']?></p>
                    			<p id="institute" style="font-size: 50px; margin-top:-30px"><?php echo $data['institution']?></p>
                    		</div>
                    	</div>
                    	<div class="row">
                    	<?php if($data['status'] == 1) {?>
                    		<div class="col">
                    			<label>Committee : </label>
                    			<h4><?php echo $committeeName?></h4>
                    		</div>
                    		<div class="col">
                    			<label>Country : </label>
                    			<h4><?php echo $userAllotment['country']?></h4>
                    		</div>
                    	<?php } else {?>
                    		<div class="col">
                    			<h3>Your allotment is pending...</h3>
                    		</div>
                    	<?php }?>
                    		
                    	</div>
                    	<br><br>
                    	
                    	<div class="row">
                    		<div class="col-6">
                    			<h4>Resources:</h4>
                                <p><a href="http://thebishopsmun.org/resources.html"class="btn btn-warning" target="blank">Study Material</a></p>
                                <p><a href="https://www.youtube.com/watch?v=ylhSqkDIJO0&list=PLNDo0HQ1H3NIoghIDUCvP0TdW0nodXWFk" class="btn btn-warning" target="blank">Training Course                                        1</a></p>
                                <p><a href="https://www.youtube.com/watch?v=VGxX98SiYH8&list=PLNDo0HQ1H3NLhwdKkr-7lc8wNLAD1Xvpd" class="btn btn-warning" target="blank">Training Course                                        2</a></p>
                    		</div>
                    		<div class="col-6">
                    			<h4>Notifications-</h4>
                    			<?php 
                    			$notify = new Notifications();
                    			$values = $notify->getNotifications();
                    			
                    			foreach ($values as $value) {
                    			?>
                    			<h6><?php echo $value?></h6>
                    			<?php     
                    			}
                    			
                    			
                    			?>
        					</div>
        				</div>
        				
        			</div>
        		</div>
        		
                <div class="col-4">
                	<a class="twitter-timeline" href="https://twitter.com/thebishopsmun/lists/mun" height="600">A Twitter List by The Bishop's MUN</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
        	</div>
        </div>
        
          <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Change Password</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <form action="index.php" method="post">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <input name="oldpass" type="text" class="form-control" placeholder="Old password">
                     </div>
                      
                    <div class="form-group">
                        <input name="newpass1" type="text" class="form-control" placeholder="New password">
                     </div>
                      
                    <div class="form-group">
                        <input name="newpass2" type="text" class="form-control" placeholder="Again password">
                     </div>
                     <input name="id" hidden="hidden" value="<?php echo $data['id']?>"/> 
                  <button name="changePassword" type="submit" class="btn btn-primary">Submit</button>
                </div>
                
                </form>
              </div>
            </div>
          </div>
        
        
        
    </body>
</html>