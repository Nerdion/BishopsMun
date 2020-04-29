<?php include_once 'head.php';?>

<html>
    <head>
        <title>Send Mail</title>
    </head>
    <body><br><br><br>
        <form action="actions/send.php" method="post" class="form-group">
            <div class="container ">
                <div class="row">
                    <div class="col">
                        <input type="text" placeholder="Subject" name="subject" class="form-control"/>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col ">
                        <textarea placeholder="Message" style="width:100%" name="message" class="form-control"></textarea>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col">
                                <input type="submit" value="Send All Mail" name="sendAllMail" class="btn btn-primary"/>
                    </div>
                </div>
                
            </div>
        </form>
    </body>
</html>

<?php include_once 'footer.php';?>