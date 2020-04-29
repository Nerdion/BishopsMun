<?php
include_once 'head.php';
$committees = new Committees();
$committeesList = $committees->getCommitteesList();
?>

<div class="container">
	<div class="row">
		<h3>Add physical entry- </h3>
	</div>
	<form action="actions/Names.php" method="post">
		<div class="form-group col-md">
			<label>Full Name-</label>
			<input type="text" name="data[fullName]" class="form-control" placeholder="Name">
		</div>
		<div class="form-group col-md">
			<label>Primary Mail-</label>
			<input type="email" name="data[mail1]" class="form-control" placeholder="Email1">
		</div>
		<div class="form-group col-md">
			<label>Secondary Mail-</label>
			<input type="email" name="data[mail2]" class="form-control" placeholder="Email2">
		</div>
		<div class="form-group col-md">
			<label>Phone1-</label>
			<input type="tel" name="data[ph1]" class="form-control" placeholder="primary phone">
		</div>
		<div class="form-group col-md">
			<label>Phone2-</label>
			<input type="tel" name="data[ph2]" class="form-control" placeholder="secondary phone">
		</div>
		<div class="form-group col-md">
			<label>Class-</label>
			<input type="text" name="data[class]" class="form-control" placeholder="class">
		</div>
		<div class="form-group col-md">
			<label>Institution-</label>
			<input type="text" name="data[institution]" class="form-control" placeholder="Institution">
		</div>
		<div class="form-group col-md">
			<label>Prior MUN Experience-</label>
			<input type="text" name="data[priorMUN]" class="form-control" placeholder="MUN">
		</div>
		<?php $passwd = $names->randomPassword(); ?>
		<input type="text" hidden="hidden" name="data[password]" value="<?php echo $passwd ?>" />
		<div class="form-group col-md container">

			<br>
			<br>
			<div class="row">
				<div class="col-6">
					<h5>Committee Preference 1</h5>
					<select id="committee1" class="countries">
						<option disabled selected value=''></option>
						<?php foreach ($committeesList as $committee) { ?>
							<option value="<?php echo $committee['id'] ?>"><?php echo  $committee['name'] ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-6">
					<h5>Country Preference 1</h5>
					<select name="data[pref][]" id="countries1" class="countries">
						<option disabled selected value=''></option>
					</select>
				</div>
			</div>

			<br>
			<br>
			<div class="row">
				<div class="col-6">
					<h5>Committee Preference 2</h5>
					<select id="committee2" class="countries">
						<option disabled selected value=''></option>
						<?php foreach ($committeesList as $committee) { ?>
							<option value="<?php echo $committee['id'] ?>"><?php echo  $committee['name'] ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-6">
					<h5>Country Preference 2</h5>
					<select name="data[pref][]" id="countries2" class="countries">
						<option disabled selected value=''></option>
					</select>
				</div>
			</div>

			<br>
			<br>
			<div class="row">
				<div class="col-6">
					<h5>Committee Preference 3</h5>
					<select id="committee3" class="countries">
						<option disabled selected value=''></option>
						<?php foreach ($committeesList as $committee) { ?>
							<option value="<?php echo $committee['id'] ?>"><?php echo  $committee['name'] ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-6">
					<h5>Country Preference 3</h5>
					<select name="data[pref][]" id="countries3" class="countries">
						<option disabled selected value=''></option>
					</select>
				</div>
			</div>
			<br>
			<br>

			<div class="row">
				<div class="col-6">
					<h5>Committee Preference 4</h5>
					<select id="committee4" class="countries">
						<option disabled selected value=''></option>
						<?php foreach ($committeesList as $committee) { ?>
							<option value="<?php echo $committee['id'] ?>"><?php echo  $committee['name'] ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-6">
					<h5>Country Preference 4</h5>
					<select name="data[pref][]" id="countries4" class="countries">
						<option disabled selected value=''></option>
					</select>
				</div>
			</div>

			<br>
			<br>
			<div class="row">
				<div class="col-6">
					<h5>Committee Preference 5</h5>
					<select id="committee5" class="countries">
						<option disabled selected value=''></option>
						<?php foreach ($committeesList as $committee) { ?>
							<option value="<?php echo $committee['id'] ?>"><?php echo  $committee['name'] ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-6">
					<h5>Country Preference 5</h5>
					<select name="data[pref][]" id="countries5" class="countries">
						<option disabled selected value=''></option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group col-md">
			<input type="submit" value="submit" class="btn btn-primary btn-lg" />
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.countries').chosen({
			width: "80%"
		});

		$('.committee').chosen({
			width: "80%"
		});
	});

	$(document).ready(function() {
		$('#committee1').change(function() {
			var inputValue = $(this).val();

			$.post('actions/actionControl.php', {
				committee: inputValue
			}, function(data) {
				data = JSON.parse(data);

				$("#countries1").empty();

				for (var i = 0; i < data.length; i++) {
					var option = $('<option />');
					option.attr({
						value: data[i].id
					}).text(data[i].country);

					$('#countries1').append(option);
				}

				$("#countries1").trigger("chosen:updated");
			});

		});

		$('#committee2').change(function() {
			var inputValue = $(this).val();

			$.post('actions/actionControl.php', {
				committee: inputValue
			}, function(data) {
				data = JSON.parse(data);
				$("#countries2").empty();
				for (var i = 0; i < data.length; i++) {
					var option = $('<option />');
					option.attr({
						value: data[i].id
					}).text(data[i].country);

					$('#countries2').append(option);
				}

				$("#countries2").trigger("chosen:updated");
			});

		});

		$('#committee3').change(function() {
			var inputValue = $(this).val();

			$.post('actions/actionControl.php', {
				committee: inputValue
			}, function(data) {
				data = JSON.parse(data);
				$("#countries3").empty();
				for (var i = 0; i < data.length; i++) {
					var option = $('<option />');
					option.attr({
						value: data[i].id
					}).text(data[i].country);

					$('#countries3').append(option);
				}

				$("#countries3").trigger("chosen:updated");
			});

		});


		$('#committee4').change(function() {
			var inputValue = $(this).val();

			$.post('actions/actionControl.php', {
				committee: inputValue
			}, function(data) {
				data = JSON.parse(data);
				$("#countries4").empty();
				for (var i = 0; i < data.length; i++) {
					var option = $('<option />');
					option.attr({
						value: data[i].id
					}).text(data[i].country);

					$('#countries4').append(option);
				}

				$("#countries4").trigger("chosen:updated");
			});

		});

		$('#committee5').change(function() {
			var inputValue = $(this).val();

			$.post('actions/actionControl.php', {
				committee: inputValue
			}, function(data) {
				data = JSON.parse(data);
				$("#countries5").empty();
				for (var i = 0; i < data.length; i++) {
					var option = $('<option />');
					option.attr({
						value: data[i].id
					}).text(data[i].country);

					$('#countries5').append(option);
				}

				$("#countries5").trigger("chosen:updated");
			});

		});
	});
</script>


<?php include 'footer.php'; ?>