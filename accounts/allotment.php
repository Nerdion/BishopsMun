<?php

include_once 'head.php';
include_once 'actions/Preference.php';
include_once 'actions/Names.php';
include_once 'actions/Committees.php';

$name = new Names();
$personInfo = $name->getInfoById($_GET['id']);

$preference = new Preference();
$preferenceList = $preference->getPreferenceByID($_GET['id']);

$allotment = new Allotment();
$committee = new Committees();

$committeesList = $committee->getCommitteesList();

?>

<div class="container">
    <form action="actions/controller.php" method="post">
    	<input hidden="hidden" value="<?php echo $_GET['id']?>" name="adminID"/>
        <?php ?>
         <div class="row">
                <div class="col ">Name-<h3><?php echo $personInfo['fullName'] ?></h3></div>
                <div class="col">Mail-<h3><?php echo $personInfo['mail1'] ?></h3></div>
         		<div class="col">Institute-<h3><?php echo $personInfo['institution'] ?></h3></div>
                <div class="col">Class-<h3><?php echo $personInfo['class'] ?></h3></div>
        </div>
        <div class="row">
        		<input hidden="hidden" value="<?php echo $personInfo['id']?>" name="nameID"/>
        </div>
        
        <div class="row">
        <div class="col">
        <table class="table">
          <thead class="thead-dark">
            <tr>
            	<th scope="col">Committee Preference Name</th>
            	<th scope="col">Country Preference Name</th>
            </tr>
          </thead>
          <?php if($personInfo['pFrom'] == 0) {?>
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
          <?php } else if ($personInfo['pFrom'] == 1) {?>
          <tbody>
          	<tr>
          		<td><?php echo $personInfo['cm1']?></td>
          		<td><?php echo $personInfo['co1']?></td>
          	</tr>
          	<tr>
          		<td><?php echo $personInfo['cm2']?></td>
          		<td><?php echo $personInfo['co2']?></td>
          	</tr>
          	<tr>
          		<td><?php echo $personInfo['cm3']?></td>
          		<td><?php echo $personInfo['co3']?></td>
          	</tr>
          	<tr>
          		<td><?php echo $personInfo['cm4']?></td>
          		<td><?php echo $personInfo['co4']?></td>
          	</tr>
          	<tr>
          		<td><?php echo $personInfo['cm5']?></td>
          		<td><?php echo $personInfo['co5']?></td>
          	</tr>
          
          </tbody>
          <?php }?>
		</table>
		</div>
		</div>
    	<div align="center" class="row">
    		<div class="col">
    			<h5>Committee Allotment</h5>
        		<select name="committeeAllotment" id="committee" class="countries">
        		<option disabled selected value=''></option>
        		<?php foreach ($committeesList as $committee) {?>
                      <option value="<?php echo $committee['id']?>"><?php echo  $committee['name'] ?></option>
                <?php }?>
    			</select>
        	</div>
        	
        	<div class="col">
    			<h5>Country Allotment</h5>
    			<select name="countryAllotment" id="country" class="countries">
    				<option disabled selected value=''></option>
    			</select>
    		</div>
        </div>
    	<br />
    	<div class="row">
    		<div class="col">
                <div align="center">
                		<input class="btn btn-dark btn-lg col-4" type="submit" value="Allot"/>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">

$(document).ready(function(){
  $('.countries').chosen({
	  width:"80%"
  });

  $('.committee').chosen({
	  width:"80%"
  });


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

<?php include_once 'footer.php';?>