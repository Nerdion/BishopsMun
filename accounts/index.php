<?php
include_once 'head.php';

$namesList = $names->getNamesList();
$committeeList = $committees->getCommitteesList();
$allotment = new Allotment();

?>
<div class="container">

  <br />
  <br />
  <form action="committeeDelegates.php" method="get">
    <div class="row">

      <?php foreach ($committeeList as $committee) { ?>
        <div class="col">
          <input name="committeeName" value="<?php echo $committee['name'] ?>" type="submit" class="btn btn-dark" />
        </div>
      <?php } ?>
    </div>
  </form>
  <br>
  <br>
  <div class="row">
    <div class="col">
      <a href="addForm.php"> <input type="button" class="btn btn-dark btn-lg" value="Add Entry" /></a>
    </div>
    <div class="col">
      <form method="post" action="actions/fileDownload.php">
        <input type="submit" name="downloadBackup" class="btn btn-dark btn-lg" value="Download backup" />
      </form>
    </div>
    <div class="col">
      <form method="post" action="actions/fileDownload.php">
        <input type="submit" name="namesListCSV" class="btn btn-dark btn-lg" value="Download Names" />
      </form>
    </div>
    <div class="col">
      <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">Insert Notification</button>
    </div>
    <div class="col">
      <form method="get" action="sendMail.php">
        <input type="submit" class="btn btn-dark" value="Send Mail" />
      </form>
    </div>
    <div class="col">
      <form action="actions/fileUpload.php" method="post" enctype="multipart/form-data">

        <input type="file" name="fileToUpload" />
        <input type="submit" name="submit" class="btn btn-dark" value="Upload Townscript File" />
      </form>
    </div>

  </div>
</div>
<br />
<br />

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Primary mail</th>
      <th scope="col">Second mail</th>
      <th scope="col">Primary Phone</th>
      <th scope="col">Secondary Phone</th>
      <th scope="col">Class</th>
      <th scope="col">Institution</th>
      <th scope="col">Prior MUN Exp</th>
      <th scope="col">Editing</th>
      <th scope="col">Allotment</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($namesList as $record) { ?>

      <tr>
        <td><?php echo $record['fullName'] ?></td>
        <td><?php echo $record['mail1'] ?></td>
        <td><?php echo $record['mail2'] ?></td>
        <td><?php echo $record['ph1'] ?></td>
        <td><?php echo $record['ph2'] ?></td>
        <td><?php echo $record['class'] ?></td>
        <td><?php echo $record['institution'] ?></td>
        <td><?php echo $record['priorMUN'] ?></td>

        <td>
          <form action="editInfo.php" method="get">
            <input type="text" hidden="hidden" name="id" value="<?php echo $record['id'] ?>" />
            <input type="submit" class="btn btn-dark" value="Edit Info" />
          </form>
        </td>
        <td>
          <form action="allotment.php" method="get">
            <p hidden="hidden" id="allotStatus<?php echo $record['id'] ?>"><?php echo $record['status'] ?></p>
            <input type="text" hidden="hidden" name="id" value="<?php echo $record['id'] ?>" />
            <input type="submit" class="btn btn-dark allotButton" id="allotButton<?php echo $record['id'] ?>" value="Allot" />
          </form>
        <td>

          <script type="text/javascript">
            $(document).ready(function() {
              var allotButton = $('#allotButton<?php echo $record['id'] ?>');
              var status = $('#allotStatus<?php echo $record['id'] ?>').text();
              if (status == 1) {
                allotButton.toggleClass('btn-dark btn-success');
                allotButton.attr('disabled', true);
              }
            });
          </script>
      </tr>
    <?php } ?>
  </tbody>
</table>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Insert New Notification</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="actions/controller.php" method="post">
          <input class="form-control" type="text" name="message" placeholder="message" />
          <br>
          <input class=" form-control btn btn-dark" value="Send" type="submit" name="notification" />
        </form>
      </div>

    </div>
  </div>
  <?php include_once 'footer.php'; ?>