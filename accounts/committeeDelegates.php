<?php
include_once 'head.php';
include_once 'actions/fileHandling.php';


if(isset($_GET['committeeName'])) {
    $committees = new Committees();
    $committeID = $committees->getCommitteeIDbyName($_GET['committeeName']);
    //echo $committeID;
    $allotment = new Allotment();
    $allotmentList = $allotment->delegateAllotmentByCommittee($committeID);
    //print_r($allotmentList);
    
    $names = new Names();
}



$committeeDetails = array();


?>

<div class="container">
	<form method="post" action="actions/fileDownload.php">

	<div class="row">
		<div class="col-3">
			<h1><?php echo $_GET['committeeName']?></h1>
    	</div>
    	<div class="col-8">
    		<input hidden="hidden" name="committeeName" value="<?php echo  $_GET['committeeName']?>" />
    		<br>
			<input name="committeeDetailsCSV" type="submit" value="Download" class="btn btn-dark" />
		</div>
	</div>
    	<br />
    	<div class="row">
    		<table class="table">
    			<thead>
    				<tr>
    					<th>Sr.No</th>
    					<th>Country</th>
    					<th>Delegate Name</th>
    					<th>Class</th>
    				</tr>
    			</thead>

    			<tbody><?php
          if(!isset($allotmentList)) { $allotmentList = [];}
    				 for ($i=0; $i<sizeof($allotmentList); $i++) {
    				     $committeeDetails[$i]['srno'] = $i+1;
    				     $committeeDetails[$i]['country'] = $allotmentList[$i]['country'];
    				     $committeeDetails[$i]['committee'] = $names->getNameById($allotmentList[$i]['nameID']);
    				     $committeeDetails[$i]['committee1'] = $names->getClassById($allotmentList[$i]['nameID']);
    				?>
    					<tr>
    						<td><?php echo $committeeDetails[$i]['srno']?></td>
    						<td><?php echo $committeeDetails[$i]['country']?></td>
    						<td><?php echo $committeeDetails[$i]['committee']?></td>
    						<td><?php echo $committeeDetails[$i]['committee1']?></td>

    					</tr>
    					<input name="committeeDetails[srno][]" value="<?php echo $committeeDetails[$i]['srno'] ?>" hidden="hidden"/>
    					<input name="committeeDetails[country][]" value="<?php echo $committeeDetails[$i]['country']?>" hidden="hidden" />
    					<input name="committeeDetails[committee][]" value="<?php echo $committeeDetails[$i]['committee']?>" hidden="hidden" />
    				    <input name="committeeDetails[committee1][]" value="<?php echo $committeeDetails[$i]['committee1']?>" hidden="hidden" />
    				<?php
    				 }

    				 ?>

    			</tbody>
    		</table>
    	</div>
</form>
</div>

<script type="text/javascript" >


</script>




<?php
include_once 'footer.php';
//print_r($committeeDetails);
?>
