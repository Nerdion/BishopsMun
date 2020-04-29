<?php

include_once 'accounts/actions/Committees.php';
include_once 'accounts/actions/Names.php';
$names = new Names();
$committees = new Committees();
$committeesList = $committees->getCommitteesList();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>The Bishop's MUN Pune</title>
<meta name="keywords" content="The Bishop's MUN  | 14th and 15th Dec 2019, Pune">
<meta name="description" content="Welcome to The Bishop’s Pune MUN. One of the most awaited Model United Nations Conference’s in Maharashtra is back with its Third Edition in the year 2019.">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<!-- All core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/all.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="css/colors.css" rel="stylesheet">
<link rel="stylesheet" href="dist/css/lightbox.min.css">
<link rel="stylesheet" href="dist/css/lightbox.css">
<link rel="stylesheet" href="accounts/css/chosen.css">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    body {
        font-family: Verdana, sans-serif;
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    .row>.column {
        padding: 0 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column {
        float: left;
        width: 100%;
    }

    /* The Modal (background) */

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */

    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 1200px;
    }

    /* The Close Button */

    .close {
        color: white;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */

    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */

    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */

    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    img {
        margin-bottom: -4px;
    }

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: black;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
</head>

<body>
    <div id="wrapper">
        <div class="sidewrapper sidenav">
            <div class="text-right"><a href="#" id="nav-close"><i class="flaticon-multiply"></i></a></div>
            <div class="widget">
                <div class="widget-title-sidebar">

                </div>
                <!-- end widget-title -->

                <div class="instagram-widget text-center">


                    <div class="image-area clearfix">

                    </div>
                </div>
                <!-- end instagram-widget -->
            </div>
            <!-- end widget -->

            <div class="footer-copy text-center">

            </div>
            <!-- end copy -->
        </div>
        <!-- end sidewrapper -->

        <?php include_once 'navbar.php' ?>

        <section class="grd4">
            <div class="container">
                <br><br> <br><br>
                <div class="section-title cpurple text-left">
                    <center>
                        <h2 style="color:white">Registration Page</h2>
                    </center>
                </div>
                <!-- end section-title -->


                <img id="top" src="top.png" alt="">
                <div id="form_container">
                    <div class="container">
                <div class="row">
                    <div class="col-12">
                    <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <form method="POST" action="accounts/actions/newRegistration.php">
                                <div class="form-group">
                                    <label for="myName">Name</label>
                                    <input name="name" type="text" class="form-control" id="myName" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
                        <!--
                        <form action="accounts/actions/Names.php" method="post">
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Full Name-</label>
                                <input type="text" name="data[fullName]" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Primary Mail-</label>
                                <input type="email" name="data[mail1]" class="form-control" placeholder="Primary Email" required>
                            </div>
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Secondary Mail-</label>
                                <input type="email" name="data[mail2]" class="form-control" placeholder="Secondary Email" required>
                            </div>
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Primary Phone(Whatsapp)-</label>
                                <input type="tel" name="data[ph1]" class="form-control" placeholder="Primary phone" required>
                            </div>
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Secondary Phone-</label>
                                <input type="tel" name="data[ph2]" class="form-control" placeholder="Secondary phone" required>
                            </div>
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Class-</label>
                                <input type="text" name="data[class]" class="form-control" placeholder="class">
                            </div>
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Institution-</label>
                                <input type="text" name="data[institution]" class="form-control" placeholder="Institution" required>
                            </div>
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Prior MUN Experience-</label>
                                <textarea type="text" name="data[priorMUN]" class="form-control" placeholder="Write 0 if none"></textarea>
                            </div>
                            <div class="form-group col-md">
                                <p style="color:#ffff;">
                                <label>Name of TBMUN Representative-</label>
                                <input type="text" name="data[rep]" class="form-control" placeholder="Representative Name">
                            </div>
                            <?php $passwd = $names->randomPassword(); ?>
                            <input type="text" hidden="hidden" name="data[password]" value="<?php echo $passwd ?>" />
                            <div class="form-group col-md container">

                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Committee Preference 1</h5>
                                        <select id="committee1" class="countries" required>
                                            <option disabled selected value=''></option>
                                            <?php foreach ($committeesList as $committee) { ?>
                                                <option value="<?php echo $committee['id'] ?>">
                                                    <?php echo  $committee['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <h5>Country Preference 1</h5>
                                        <select name="data[pref][]" id="countries1" class="countries" required>
                                            <option disabled selected value=''></option>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Committee Preference 2</h5>
                                        <select id="committee2" class="countries" required>
                                            <option disabled selected value=''></option>
                                            <?php foreach ($committeesList as $committee) { ?>
                                                <option value="<?php echo $committee['id'] ?>">
                                                    <?php echo  $committee['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <h5>Country Preference 2</h5>
                                        <select name="data[pref][]" id="countries2" class="countries" required>
                                            <option disabled selected value=''></option>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Committee Preference 3</h5>
                                        <select id="committee3" class="countries" required>
                                            <option disabled selected value=''></option>
                                            <?php foreach ($committeesList as $committee) { ?>
                                                <option value="<?php echo $committee['id'] ?>">
                                                    <?php echo  $committee['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <h5>Country Preference 3</h5>
                                        <select name="data[pref][]" id="countries3" class="countries" required>
                                            <option disabled selected value=''></option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>

                                <div class="row">
                                    <div class="col-6">
                                        <h5>Committee Preference 4</h5>
                                        <select id="committee4" class="countries" required>
                                            <option disabled selected value=''></option>
                                            <?php foreach ($committeesList as $committee) { ?>
                                                <option value="<?php echo $committee['id'] ?>">
                                                    <?php echo  $committee['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <h5>Country Preference 4</h5>
                                        <select name="data[pref][]" id="countries4" class="countries" required>
                                            <option disabled selected value=''></option>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Committee Preference 5</h5>
                                        <select id="committee5" class="countries" required>
                                            <option disabled selected value=''></option>
                                            <?php foreach ($committeesList as $committee) { ?>
                                                <option value="<?php echo $committee['id'] ?>">
                                                    <?php echo  $committee['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <h5>Country Preference 5</h5>
                                        <select name="data[pref][]" id="countries5" class="countries" required>
                                            <option disabled selected value=''></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <p><input type="checkbox" required name="terms"><a href="t&c.pdf" target="_blank">I accept the <u>Terms and Conditions</u></a> </p>
                                <input type="submit" value="submit" class="btn btn-primary btn-lg" />
                            </div>
                        </form>
                                            -->
                    </div>
                </div>
            </div>
            <br><br>
                </div>
                <img id="bottom" src="bottom.png" alt="">
                <h3 style="color:white">Terms and Conditions:</h3>
                <p style="color:#ffff;">
                    1. The registration fee is a one-time payable non-refundable amount.
                    <br>2. The Bishop’s Model UN is not responsible for any wrong information provided by the
                    participants.
                    <br>3. All details provided by the participants shall be kept confidential.
                    <br>4. Country and/or committee preference selected by the participant does not guarantee him/her
                    the same.
                    <br>5. Country and committee allocation shall be sent to the participant on the email address
                    provided by him/her, within 30 days from the date of registration. In the event of the participant
                    not receiving the mail, the same should
                    be notified to The Bishop’s Model UN immediately.
                    <br>6. Allocation once made shall be final and any request made for a change of the same shall not
                    be entertained.
                    <br>7. Any cheques that bounce shall have bank charges applicable and will be subject to the
                    provisions of the law.
                    <br>8. Certificates of participation will only be given to the delegates if they are present for all
                    the ceremonies and committee sessions. No exceptions will be made.
                </p>
            </div>
            <!-- end container --><br><br>

            <!-- end section -->
            
        </section>


        <img src="images/patti.jpg" width="100%" alt="MUN Pune">
        <!---- <div class="section bt littlepad">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        
                            <center><img src="images/logo1.jpg" alt="" class="img-fluid"></center>
                       
                    </div>
                   <div class="col-md-3 col-sm-12 col-xs-12">
                        
                             <center><img src="images/logo2.jpg" alt="" class="img-fluid"></center>
                       
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        
                            <center> <img src="images/logo3.jpg" alt="" class="img-fluid"></center>
                       
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        
                            <center><img src="images/logo4.jpg" alt="" class="img-fluid"></center>
                      
                    </div>
                
                </div>
            </div>
        </div>-->
        <section class="grd4" id="contact">
            <footer class="grd4">
                <div class="container">
                    <br><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="widget-title">
                                <font color="white"><i class="fa fa-map-marker"></i> Address</font>
                            </h4>
                            <p>
                                <font color="white">The Bishop's School, Camp, <br>Pune - 411001 </font>
                            </p>
                        </div>
                        <!-- end col -->

                        <div class="col-md-4">
                            <h4 class="widget-title">
                                <font color="white"><i class="fa fa-phone"></i> Phone</font>
                            </h4>
                            <p>
                                <font color="white">+91 9325320850</font>
                            </p>
                        </div>
                        <!-- end col -->

                        <div class="col-md-4">
                            <h4 class="widget-title">
                                <font color="white"><i class="fa fa-envelope-open-o"></i> Email</font>
                            </h4>
                            <p>
                                <font color="white">info@thebishopsmun.org</font>
                            </p>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <form action="contact1.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Mobile No">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="msg" name="msg" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Send Message" class="btn btn-orange ">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- end row -->



                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="footer-social">
                            <div itemscope="" itemtype="http://schema.org/Organization">
                                <a class="social-icon" target="_blank" itemprop="sameAs" href="https://www.facebook.com/thebishopsmun"><i class="fa fa-facebook"></i></a>
                                <a class="social-icon" target="_blank" itemprop="sameAs" href="https://www.youtube.com/channel/UCBQ1ZqqfspH9UU5Q8trbSOg"><i class="fa fa-youtube"></i></a>
                                <a class="social-icon" target="_blank" itemprop="sameAs" href="https://www.instagram.com/thebishopsmun"><i class="fa fa-instagram"></i></a>
                                <a class="social-icon" target="_blank" itemprop="sameAs" href="https://twitter.com/thebishopsmun"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                        <div class="footer-copy">
                            <p>Design By The Bishop's MUN Team</p>
                        </div>
                        <!-- end copy -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
    </div>
    <!-- end container -->
    </footer>
    <!-- end footer -->
    </div>
    <!-- end wrapper -->
    </section>

    <div class="dmtop"><i class="fa fa-long-arrow-up"></i></div>

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/custom.js"></script>
    <script src="dist/js/lightbox-plus-jquery.min.js"></script>
    <script src="accounts/js/chosen.jquery.min.js" type="text/javascript"></script>
    <script>
        function openModal() {
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>

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

                $.post('accounts/actions/actionControl.php', {
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

                $.post('accounts/actions/actionControl.php', {
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

                $.post('accounts/actions/actionControl.php', {
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

                $.post('accounts/actions/actionControl.php', {
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

                $.post('accounts/actions/actionControl.php', {
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


</body>

</html>