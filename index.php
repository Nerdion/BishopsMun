 <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
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
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
body {
  font-family: Verdana, sans-serif;
  background: rgba(67,206,162,1);
background: -moz-linear-gradient(left, rgba(67,206,162,1) 0%, rgba(24,89,130,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(67,206,162,1)), color-stop(100%, rgba(24,89,130,1)));
background: -webkit-linear-gradient(left, rgba(67,206,162,1) 0%, rgba(24,89,130,1) 100%);
background: -o-linear-gradient(left, rgba(67,206,162,1) 0%, rgba(24,89,130,1) 100%);
background: -ms-linear-gradient(left, rgba(67,206,162,1) 0%, rgba(24,89,130,1) 100%);
background: linear-gradient(to right, rgba(67,206,162,1) 0%, rgba(24,89,130,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#43cea2', endColorstr='#185982', GradientType=1 );
  margin: 0;
}

* {
  box-sizing: border-box;
}

.row > .column {
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
  
  top:10px;
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
  color: white;
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
<style>
#animated-number {
  padding: 87px 0 87px;
  background: #132125 url(upload/back.jpg) no-repeat 0 0;
  background-size: cover;
  color: #fff;
}
#animated-number h1,
#animated-number h2,
#animated-number h3,
#animated-number h4 {
  color: #fff;
}
#animated-number strong {
  display: block;
  margin-bottom: 30px; font-size:22px; font-family: 'Roboto-light'; text-transform:capitalize;
}
.animated-number {
  display: inline-block;font-family: 'Roboto-medium';
  width: 180px;
  height: 180px;
  font-size: 29px;
  line-height: 180px;
  border: 5px solid #fff;
  border-radius: 100px;
  margin-bottom: 20px;
}
.box {
  background-color: lightgrey;
  width: 100%;
  border: 7px solid #007ed6;
  padding: 10px;
  margin: 10px;
}
</style>
</head>
<body>
    <div id="wrapper">
        <div class="sidewrapper sidenav">
            <div class="text-right"><a href="#" id="nav-close"><i class="flaticon-multiply"></i></a></div>
            <div class="widget">
                <div class="widget-title-sidebar">
                   
                </div><!-- end widget-title -->

                <div class="instagram-widget text-center">
                  

                    <div class="image-area clearfix">
                        
                    </div>                  
                </div><!-- end instagram-widget -->
            </div><!-- end widget -->

            <div class="footer-copy text-center">
               
            </div><!-- end copy -->
        </div><!-- end sidewrapper -->

        <?php include_once 'navbar.php' ?>

        <section class="hero">
            <div class="magnifier grd3"></div>
            <div class="container">
                <div class="hero-desc">
                    <div class="row">
                        <div class="col-md-12">
                            <br><br> <br><br> <br><br><img src="upload/logo.png" alt="MUN PUNE">
                            <h2>The Bishop's MUN Pune</h2>
                             <a href="https://www.facebook.com/thebishopsmun" class="btn btn-orange withradius secbtn withicon" target="blank">Click here for Event Photos<i class="fa fa-long-arrow-right"></i></a>
                             <a href="https://www.youtube.com" class="btn btn-orange withradius secbtn withicon" target="blank">After Movie 3rd Edition<i class="fa fa-long-arrow-right"></i></a>
                        
                            
                           <br><br><br><br>
                            
                        </div>
                    </div>
                </div>
            </div>
           

        </section><!-- end section -->

             <section class="grd4">                
            <div class="container">
             
                <br><br> <center><h3><font color="white">What is The Bishop's MUN?</font></h3></center>
                 <br>
                <div class="row align-items-center">

                   

                    <div class="col-md-6 mobmartop30">
                        <div class="tagline-v2 padleft30">
                           
                            <p><font color="#fff">The Bishop’s MUN, a diplomatic simulation of the United Nations, is one of Pune’s eminent conferences for students. It is a platform for students to not only keep up with the global issues but also parallel the real world leaders and attempt to find solutions for the same. The Bishop’s MUN is an extensive learning experience that pushes students to challenge their abilities to perfect their skill set. 

<br>It is a platform that leaves students better equipped with leadership abilities and public speaking and problem solving skills that endure a lifetime, cumulated over the course of two days.</font></p>
                            
                        </div><!-- end tagline -->
                    </div><!-- end col -->
                    <div class="col-md-6">
                        <div class="screen-normal wow slideInLeft">
                            <img src="upload/screen_01.jpg" alt="MUN PUNE" class="img-fluid">
                        </div><!-- end screen -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container --> <br><center>
                <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a></center><br>
      
        </section><!-- end section -->





  
   
  





          <section class="section lb">
            <div class="container">
                <div class="section-title text-center">
                    
                    <h2>Why participate in MUNs?</h2>
                </div><!-- end section-title -->

                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="service-box text-center">
                            <img src="images/icons/icon_01.png" alt="MUN PUNE" class="img-fluid">
                            <h4>1.Knowledge</h4>
                            <p>Attending a conference like The Bishop’s MUN will increase your knowledge about existing social, economic and political issues. The conference not only involves young people in the study and discussion of global issues, but also encourages the development of skills useful throughout their lives.
                            </p>

                           

                           
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-4 mobmar30">
                        <div class="service-box text-center">
                            <img src="images/icons/icon_02.png" alt="MUN PUNE" class="img-fluid">
                            <h4>2.Skill Set</h4>
                            <p>Taking part as a delegate helps in building one’s confidence and increase their social skills. Participating at a Model UN also teaches vital skills in negotiation, public speaking, problem solving, conflict resolution, research and communication<br><br>
                            </p>

                           
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-4">
                        <div class="service-box text-center">
                            <img src="images/icons/icon_03.png" alt="MUN PUNE" class="img-fluid">
                            <h4>3.Network</h4>
                            <p>Model UN gives students the opportunity to meet interesting new people and make new friends.<br><br><br><br><br>
                            </p>

                            
                        </div><!-- end box -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
            <br><center>
                <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a></center>
        </section><!-- end section -->

 <section id="animated-number">
        <div class="container">
            

            <div class="row text-center">
                <div class="col-sm-4 col-xs-12">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="animated-number" data-digit="3" data-duration="1000"></div>
                       <h3>Number of Conferences</h3>
                    </div>
                </div>
                
                <div class="col-sm-4 col-xs-12">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="animated-number" data-digit="950+" data-duration="1000"></div>
                          <h3>Number of Delegates</h3>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="animated-number" data-digit="50000" data-duration="1000"></div>
                          <h3>Amount Donated</h3>
                    </div>
                </div>
                
            </div>
        </div>
    </section><!--/#animated-number-->

         <section class="grd4" id="committees">
            <div class="container">
                <div class="section-title text-center">
                   <br><br>
                    <h2><font color="white">Committees</font></h2>
                </div><!-- end section-title -->

                <div id="works_01" class="owl-carousel owl-theme owl-style-02">
                    <div class="owl-work-item">
                        <div class="portfolio-ver-01">
                            <div class="media-element">
                                <img src="upload/c1.jpg" alt="MUN PUNE" class="img-fluid">
                            </div><!-- end media -->
                            <div class="portfolio-details"> 
                                <h4>Yet to be decided</h4>
                                <p>Yet to be decided<br><br></p>
                            </div><!-- end details -->
                            <div class="portfolio-meta clearfix">
                                <div class="float-left">
                                     <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                              
                            </div><!-- end meta -->
                        </div><!-- end portfolio-ver -->
                    </div><!-- end col -->
                    <div class="owl-work-item">
                        <div class="portfolio-ver-01">
                            <div class="media-element">
                                <img src="upload/c2.jpg" alt="MUN PUNE" class="img-fluid">
                            </div><!-- end media -->
                            <div class="portfolio-details"> 
                                <h4>Yet to be decided</h4>
                                <p>Yet to be decided</p>
                            </div><!-- end details -->
                            <div class="portfolio-meta clearfix">
                                <div class="float-left">
                                     <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                              
                            </div><!-- end meta -->
                        </div><!-- end portfolio-ver -->
                    </div><!-- end col -->

                     <div class="owl-work-item">
                        <div class="portfolio-ver-01">
                            <div class="media-element">
                                <img src="upload/c3.jpg" alt="MUN PUNE" class="img-fluid">
                            </div><!-- end media -->
                            <div class="portfolio-details"> 
                                <h4>Yet to be decided</h4>
                                <p>Yet to be decided</p>
                            </div><!-- end details -->
                            <div class="portfolio-meta clearfix">
                                <div class="float-left">
                                      <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                              
                            </div><!-- end meta -->
                        </div><!-- end portfolio-ver -->
                    </div><!-- end col -->

                     <div class="owl-work-item">
                        <div class="portfolio-ver-01">
                            <div class="media-element">
                                <img src="upload/c4.jpg" alt="MUN PUNE" class="img-fluid">
                            </div><!-- end media -->
                            <div class="portfolio-details"> 
                                <h4>Yet to be decided </h4>
                                <p>Yet to be decided</p>
                            </div><!-- end details -->
                            <div class="portfolio-meta clearfix">
                                <div class="float-left">
                                      <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                              
                            </div><!-- end meta -->
                        </div><!-- end portfolio-ver -->
                    </div><!-- end col -->

                     <div class="owl-work-item">
                        <div class="portfolio-ver-01">
                            <div class="media-element">
                                <img src="upload/c5.jpg" alt="MUN PUNE" class="img-fluid">
                            </div><!-- end media -->
                            <div class="portfolio-details"> 
                                <h4>Yet to be decided</h4>
                                <p>Yet to be decided</p>
                            </div><!-- end details -->
                            <div class="portfolio-meta clearfix">
                                <div class="float-left">
                                     <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                              
                            </div><!-- end meta -->
                        </div><!-- end portfolio-ver -->
                    </div><!-- end col -->

                     <div class="owl-work-item">
                        <div class="portfolio-ver-01">
                            <div class="media-element">
                                <img src="upload/c6.jpg" alt="MUN PUNE" class="img-fluid">
                            </div><!-- end media -->
                            <div class="portfolio-details"> 
                                <h4>Yet to be decided</h4>
                                <p>Yet to be decided</p>
                            </div><!-- end details -->
                            <div class="portfolio-meta clearfix">
                                <div class="float-left">
                                     <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                              
                            </div><!-- end meta -->
                        </div><!-- end portfolio-ver -->
                    </div><!-- end col -->

                     <div class="owl-work-item">
                        <div class="portfolio-ver-01">
                            <div class="media-element">
                                <img src="upload/c7.jpg" alt="MUN PUNE" class="img-fluid">
                            </div><!-- end media -->
                            <div class="portfolio-details"> 
                                <h4>Yet to be decided</h4>
                                <p>Yet to be decided<br><br></p>
                            </div><!-- end details -->
                            <div class="portfolio-meta clearfix">
                                <div class="float-left">
                                      <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                              
                            </div><!-- end meta -->
                        </div><!-- end portfolio-ver -->
                    </div><!-- end col -->

                     <div class="owl-work-item">
                        <div class="portfolio-ver-01">
                            <div class="media-element">
                                <img src="upload/c8.jpg" alt="MUN PUNE" class="img-fluid">
                            </div><!-- end media -->
                            <div class="portfolio-details"> 
                                <h4>Yet to be decided</h4>
                                <p>Yet to be decided</p>
                            </div><!-- end details -->
                            <div class="portfolio-meta clearfix">
                                <div class="float-left">
                                      <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                              
                            </div><!-- end meta -->
                        </div><!-- end portfolio-ver -->
                    </div><!-- end col -->             
                </div><!-- end row -->
            </div><!-- end container --> <br><center>
                <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a>  <a href="resources.html" class="btn btn-orange withradius secbtn withicon">Click for Resources<i class="fa fa-long-arrow-right"></i></a></center><br>
        </section><!-- end section -->

        <section id="testimonials">
            <div class="container">
               

             

                <div class="section-title text-center">
                   <br><br>
                    <h2>Testimonials</h2>
                </div><!-- end section-title -->

                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div id="testimonial_01" class="owl-carousel owl-theme owl-style-01">
                            <div class="testi-style-01 clearfix">    
                                <img src="upload/1.jpg" alt="MUN PUNE" class="img-fluid rounded-circle float-left">
                                <h4>Aadi Sardesai, <small>The HDFC School, Pune </small></h4>
                                <p>It was my first MUN and it was an awesome experience! Really loved it and looking forward to take part in the next one!</p>
                            </div><!-- end testimonial -->

                            <div class="testi-style-01 clearfix">    
                                <img src="upload/2.jpg" alt="MUN PUNE" class="img-fluid rounded-circle float-left">
                                <h4>Maithily Khairnar, <small>Euro School, Wakad, Pune </small></h4>
                                <p>It was a really good. It is an amazing experience for someone who wants a career in doing something good for ones nation and the World. I was in Economical and Financial development. I had no idea that there were radiational threats in Central Asia. So, MUN also keeps you updated about current issues.</p>
                            </div><!-- end testimonial -->

                            <div class="testi-style-01 clearfix">    
                                <img src="upload/3.jpg" alt="MUN PUNE" class="img-fluid rounded-circle float-left">
                                <h4>Hemendra Singh Shekhawat, <small>Army Public School, Pune </small></h4>
                                <p>It was really innovative that attendance was taken through bar code scanning and there were many other things also like panel discussion, state dinner, etc. </p>
                            </div><!-- end testimonial -->
                            <div class="testi-style-01 clearfix">    
                                <img src="upload/4.jpg" alt="MUN PUNE" class="img-fluid rounded-circle float-left">
                                <h4>Tanaya Devadhe, <small>Hutchings High School, Pune </small></h4>
                                <p>Bishop's MUN was a great experience. The response team is great at its job and so are the other members of the organization. This MUN surely gave my confidence a boost and is one of the most memorable events of my life. Apart from enjoyment, it was also an amazing learning experience. I'm surely looking forward to the next edition of this MUN.</p>
                            </div><!-- end testimonial -->
                            <div class="testi-style-01 clearfix">    
                                <img src="upload/5.jpg" alt="MUN PUNE" class="img-fluid rounded-circle float-left">
                                <h4>Namaswi Chintha, <small>Amanora school, Pune</small></h4>
                                <p>It was an amazing experience. Really enjoyed working with my committee and the learning process was superb. The chair and the secretary were fantastic. My fellow delegates were also cooperative. It was really fun and the agendas provided were also relevant. The food was amazing and tasty and the Opening ceremony and panel discussion was quite informative and interesting.
Really enjoyed and would recommend this MUN. </p>
                            </div><!-- end testimonial -->

                        </div><!-- end owl -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container --> <br><center>
                <a href="register.html" class="btn btn-orange withradius secbtn withicon">Register Here<i class="fa fa-long-arrow-right"></i></a></center><br>
        </section>

        <section class="grd4"><div id="example1">
<br><br>
<center><h2><font color="#fff">Countdown For The Bishop's MUN</h2></center></font>
<hr>
<center><p id="demo" style="font-size:30px; color:#fff;"></p><br></center>


</div>
</section>

<section id="gallery">
<br><br><h2 style="text-align:center;"><b>Gallery</b></h2><br>


 
    <div class="row">
      <div class="col-sm-3" style="padding: 25px 25px;">
      <a class="example-image-link" href="gallery/1.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="example-image" src="gallery/1.jpg" alt="MUN PUNE"/ style="width:100%">
      </a>
    </div>

      <div class="col-sm-3" style="padding: 25px 25px;">
      <a class="example-image-link" href="gallery/2.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="example-image" src="gallery/2.jpg" alt="MUN PUNE"/ style="width:100%">
      </a>
    </div>

        <div class="col-sm-3" style="padding: 25px 25px;">
       <a class="example-image-link" href="gallery/3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="example-image" src="gallery/3.jpg" style="width:100%" alt="MUN PUNE"/>
      </a>
    </div>

        <div class="col-sm-3" style="padding: 25px 25px;">
       <a class="example-image-link" href="gallery/4.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="example-image" src="gallery/4.jpg" style="width:100%" alt="MUN PUNE"/>
      </a>
    </div>
  </div>

   <div class="row" >
      <div class="col-sm-3" style="padding: 25px 25px;">
      <a class="example-image-link" href="gallery/5.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="example-image" src="gallery/5.jpg" alt="MUN PUNE"/ style="width:100%">
      </a>
    </div>

      <div class="col-sm-3" style="padding: 25px 25px;">
      <a class="example-image-link" href="gallery/6.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="example-image" src="gallery/6.jpg" alt="MUN PUNE"/ style="width:100%">
      </a>
    </div>

        <div class="col-sm-3" style="padding: 25px 25px;">
       <a class="example-image-link" href="gallery/7.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="example-image" src="gallery/7.jpg" style="width:100%" alt="MUN PUNE"/>
      </a>
    </div>

        <div class="col-sm-3" style="padding: 25px 25px;">
       <a class="example-image-link" href="gallery/8.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
        <img class="example-image" src="gallery/8.jpg" style="width:100%" alt="MUN PUNE"/>
      </a>
    </div>
  </div>
 <br><center>
                <a href="https://www.facebook.com/thebishopsmun" class="btn btn-orange withradius secbtn withicon">Click Here for More Photos<i class="fa fa-long-arrow-right"></i></a></center><br>
     </section>   
<img src="images/patti.jpg" width="100%" alt="MUN PUNE">
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
                                            <p><font color="white">The Bishop's School, Camp, <br>Pune - 411001 </font></p>
                                        </div><!-- end col -->

                                        <div class="col-md-4">
                                            <h4 class="widget-title">
                                                <font color="white"><i class="fa fa-phone"></i> Phone</font>
                                            </h4>  
                                            <p><font color="white">+91 9325320850</font></p>
                                        </div><!-- end col -->

                                        <div class="col-md-4">
                                            <h4 class="widget-title">
                                                <font color="white"><i class="fa fa-envelope-open-o"></i>  Email</font>
                                            </h4>  
                                            <p><font color="white">info@thebishopsmun.org</font></p>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                            <form action="contact1.php" method="post">
                                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name"  class="form-control" placeholder="Name">
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
                                        <div class="g-recaptcha" data-sitekey="6LffpOUUAAAAAAzzWMCEOxie0EHPYTYqaGTsRZWC"> required</div>
                                        <input type="submit" value="Send Message" class="btn btn-orange ">
                                    </div>
                                </div>
                            </div>
                        </form>
                            
                </div><!-- end row -->
                
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
                        </div><!-- end copy -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->
    </div><!-- end wrapper -->
</section>

    <div class="dmtop"><i class="fa fa-long-arrow-up"></i></div>

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/custom.js"></script>

        <script>
// Set the date we're counting down to
var countDownDate = new Date("Oct 31, 2020 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
    <script src="dist/js/lightbox-plus-jquery.min.js"></script>
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
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
  <script src="js2/jquery.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js2/owl.carousel.min.js"></script>
    <script src="js2/mousescroll.js"></script>
    <script src="js2/smoothscroll.js"></script>
    <script src="js2/jquery.prettyPhoto.js"></script>
    <script src="js2/jquery.isotope.min.js"></script>
    <script src="js2/jquery.inview.min.js"></script>
    <script src="js2/wow.min.js"></script>
    <script src="js2/main.js"></script>
  <script src="js2/scrolling-nav.js"></script>
</body>
</html>