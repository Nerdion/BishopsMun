<?php 
include_once 'head.php';
$id = $_GET['id'];


$names = new Names();
$data = $names->getInfoById($id);

$preference = new Preference();
$preferenceList = $preference->getPreferenceByID($_GET['id']);

$allotment = new Allotment();
$committee = new Committees();

$committeesList = $committee->getCommitteesList();

$userAllotment = $allotment->getAllotmentDetailsByNameID($_GET['id']);
//print_r($userAllotment);
//print_r($data);
?>

<br>
<br>
<div align="center" class="container">
	<form action="actions/resendMail.php" method="post">
		<input type="text" name="userID" value="<?php echo $id ?>" hidden="hidden" />
		<input class="btn btn-primary" type="submit" name="resendMail" value="Resend Information"/>
	</form>
</div>

<div class="container">
<br>
<div class="row">
    <h3>Edit physical entry- </h3>
</div>
<form action="actions/Names.php" method="post">
	<input hidden="hidden" name="cdata[id]" value="<?php echo $id?>" />
    <div class="form-group col-md">
      <label>Full Name-</label>
      <input type="text" name="cdata[fullName]" class="form-control" placeholder="Name" value="<?php echo(isset($data['fullName']) ? $data['fullName'] : '') ?>">
    </div>
    <div class="form-group col-md">
      <label>Primary Mail-</label>
      <input type="email" name="cdata[mail1]" class="form-control" placeholder="Email1" value="<?php echo(isset($data['mail1']) ? $data['mail1'] : '') ?>">
    </div>
    <div class="form-group col-md">
      <label>Secondary Mail-</label>
      <input type="email" name="cdata[mail2]" class="form-control" placeholder="Email2" value="<?php echo(isset($data['mail2']) ? $data['mail2'] : '') ?>">
    </div>
    <div class="form-group col-md">
      <label>Phone1-</label>
      <input type="tel" name="cdata[ph1]" class="form-control" placeholder="primary phone" value="<?php echo(isset($data['ph1']) ? $data['ph1'] : '') ?>">
    </div>
    <div class="form-group col-md">
      <label>Phone2-</label>
      <input type="tel" name="cdata[ph2]" class="form-control" placeholder="secondary phone" value="<?php echo(isset($data['ph2']) ? $data['ph2'] : '') ?>">
    </div>
    <div class="form-group col-md">
      <label>Class-</label>
      <input type="text" name="cdata[class]" class="form-control" placeholder="class" value="<?php echo(isset($data['class']) ? $data['class'] : '') ?>">
    </div>
    <div class="form-group col-md">
      <label>Institution-</label>
      <input type="text" name="cdata[institution]" class="form-control" placeholder="Institution" value="<?php echo(isset($data['institution']) ? $data['institution'] : '') ?>">
    </div>
    <div class="form-group col-md">
      <label>Prior MUN Experience-</label>
      <input type="text" name="cdata[priorMUN]" class="form-control" placeholder="MUN" value="<?php echo(isset($data['priorMUN']) ? $data['priorMUN'] : '') ?>">
    </div>
    <br />
    <br />
    
    <br />
    	<div class="row">
    	
    <div align="center" class="form-group col-md " >
    		<input type="submit" value="Update Details" class="btn btn-primary btn-lg"/>
    	</div>
    	</div>
    </form>
    
    
    <?php if($data['status'] == 1) {?>
    <form action="actions/controller.php" method="post">
    <h3>Change the allotment -</h3>
    <table class="table">
          <thead class="thead-dark">
            <tr>
            	<th scope="col">Committee Preference Name</th>
            	<th scope="col">Country Preference Name</th>
            </tr>
          </thead>
          <?php if($data['pFrom'] == 0) {?>
          <tbody>
          <?php foreach ($preferenceList as $preference) {
             $allotmentInfo =  $allotment->getAllotmentDetailsByID($preference);
             $committeeName = $committee->getCommitteeNameByID($allotmentInfo['orgID']);
           ?>
            <tr>
                <td><?php echo $committeeName?></td>
                <td><?php echo $allotmentInfo['country']?></td>
            </tr>
            <?php }?>
          </tbody>
          <?php } else if ($data['pFrom'] == 1) {?>
          <tbody>
          	<tr>
          		<td><?php echo $data['cm1']?></td>
          		<td><?php echo $data['co1']?></td>
          	</tr>
          	<tr>
          		<td><?php echo $data['cm2']?></td>
          		<td><?php echo $data['co2']?></td>
          	</tr>
          	<tr>
          		<td><?php echo $data['cm3']?></td>
          		<td><?php echo $data['co3']?></td>
          	</tr>
          	<tr>
          		<td><?php echo $data['cm4']?></td>
          		<td><?php echo $data['co4']?></td>
          	</tr>
          	<tr>
          		<td><?php echo $data['cm5']?></td>
          		<td><?php echo $data['co5']?></td>
          	</tr>
          
          </tbody>
          <?php }?>
	</table>
	<br/>
	<br/>
	
	<div class="row">
		<h4>Old Allotment-</h4>
		<div class="col">
			<div class="col ">Old committee-<h3><?php echo $committee->getCommitteeNameByID($userAllotment['orgID'])?></h3></div>
		</div>
		<div class="col">
			<div class="col ">Old country-<h3><?php echo $userAllotment['country']?></h3></div>
		</div>
	</div>
	
	<br />
	<div align="center" class="row">
		<input hidden="hidden" name="oldAllotment" value="<?php echo $userAllotment['id']?>"/>
		<input hidden="hidden" name="nameID" value="<?php echo $data['id']?>"/>
		
    		<div class="col">
    			<h5>Committee Allotment</h5>
        		<select id="committee" class="countries">
        		<option disabled selected value=''></option>
        		<?php foreach ($committeesList as $committee) {?>
                      <option value="<?php echo $committee['id']?>"><?php echo  $committee['name'] ?></option>
                <?php }?>
    			</select>
        	</div>
        	
        	<div class="col">
    			<h5>Country Allotment</h5>
    			<select name="changedNewAllotment" id="country" class="countries">
    				<option disabled selected value=''></option>
    			</select>
    		</div>
        </div>
        <br />
    	<br />
    	<div class="row">
    	
    <div align="center" class="form-group col-md " >
    		
    		<input type="submit" value="Update Allotment" class="btn btn-primary btn-lg"/>
    	</div>
    </div>
</form>
        
    <?php }?>
    	</div>

<script type="text/javascript">

$(document).ready(function(){
  $('.countries').chosen({
	  width:"80%"
  });

  $('.committee').chosen({
	  width:"80%"
  });
});

$(document).ready(function() {
	$('#committee').change(function() {
		var inputValue = $(this).val();
		
		$.post('actions/actionControl.php', {committee : inputValue}, function(data) {
			data = JSON.parse(data);
			
			$("#country").empty();
			
			for(var i=0; i<data.length; i++) {
				var option = $('<option />');
				option.attr({value : data[i].id}).text(data[i].country);
				$('#country').append(option);
			}
			
			$("#country").trigger("chosen:updated");
		});
		
	});
});
</script>


<?php include 'footer.php';?>