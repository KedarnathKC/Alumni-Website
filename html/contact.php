<script type="text/javascript">
    $(function() {
        $('[data-tooltip]').tooltip({
            animation:true,
            delay:{show:300,hide:500},
            font-size:50,

        });
    });
</script>
<script>
    
    function ValidateContactForm(){
            
            var email=document.ContactForm.cbxemail.value;
            var name=document.ContactForm.cbxname.value;
            var sub=document.ContactForm.cbxsubject.value;
            var msg=document.ContactForm.cbxmessage.value;
            
            
            regExpEmail=/^[a-zA-Z0-9]*[@][a-z]*[.][a-z]{2,4}$/; 
            regExpPass=/^[A-Za-z0-9@$]{6,16}$/;
            if(name.length>50){
                alert("Please Enter Valid Name. Max length allowed for Name is 50!");
                return false;
            }
            if(!email.match(regExpEmail))
            {
                alert("Please Enter Valid Email id");
                return false;   
            }
            if(sub.length>100){
                alert("Please Enter Valid Subject. Max length allowed for Subject is 100!");
                return false;
            }
            if(msg.length>100){
                alert("Please Enter Valid Message. Max length allowed for Message is 100!");
                return false;
            }           
            return true;    
        }
</script>
<?php
    session_start();
    require "php/config.php";
    function sendMSG($name,$subject,$msg,$to_email){
        $subject1 = "This is the query you submitted on the page : ".$subject;
        $body="Hey ".$name.", below is the message you have submitted us. We will get back to you as soon as possible \n".$msg;
        $headers = "From: alumnidosuor@gmail.com";
        if (mail($to_email, $subject1, $body, $headers)) {
            return 1;
        } 
        else{
            /*
            $a=sendOTP($otp,$body,$to_email);
            return 1;*/
            echo "<script>alert('Couldn\'t send the mail.. Kindly try again' )</script>";
            echo "<script>window.location.href='contact.php'</script>";
        }             
    }
    if(isset($_SESSION['uid']))
    {
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['username'];
    }
    if(isset($_POST['Send'])) {
        $name=$_POST['cbxname'];
        $email=$_POST['cbxemail'];
        $subject=$_POST['cbxsubject'];
        $msg=$_POST['cbxmessage'];
        $checkbox=$_POST['cbxsendme'];
        $insert="insert into contact (name,email,subject,message) values('$name','$email','$subject','$msg') ";
        if(mysqli_query($dbhandle,$insert)){
            if(strcmp($checkbox,"on")==0){
                if(sendMSG($name,$subject,$msg,$email)==1){
                    echo "<script>alert('We have registered your query and have sent you a copy of the same to your email. Will get back to you as soon as possible. Thank You. ')</script>";
                    //echo "<script>window.location.href='index.php'</script>";    
                }
            }
            else{
                echo "<script>alert('We have registered your query. Will get back to you as soon as possible . Thank you.')</script>";
                //echo "<script>window.location.href='index.php'</script>";
            }    
        }
        else{
            echo "<script>alert('Sorry couldn\'t submit your query.. Try again')</script>";
            //echo "<script>window.location.href='index.php'</script>";
        }
    }
    
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from codeboxr.net/themedemo/unialumni/html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 17:11:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>uniAlumni</title>

    <meta name="description" content="simple description for your site"/>
<meta name="keywords" content="keyword1, keyword2"/>
<meta name="author" content="Jobz"/>

<!-- twitter card starts from here, if you don't need remove this section -->
<meta name="twitter:card" content="summary"/>
<meta name="twitter:site" content="@yourtwitterusername"/>
<meta name="twitter:creator" content="@yourtwitterusername"/>
<meta name="twitter:url" content="http://twitter.com/"/>
<meta name="twitter:title" content="Your home page title, max 140 char"/> <!-- maximum 140 char -->
<meta name="twitter:description" content="Your site description, maximum 140 char "/> <!-- maximum 140 char -->
<meta name="twitter:image"
      content="assets/img/twittercardimg/twittercard-144-144.png"/>  <!-- when you post this page url in twitter , this image will be shown -->
<!-- twitter card ends here -->

<!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
<meta property="og:title" content="Your home page title"/>
<meta property="og:url" content="http://your domain here.com"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:site_name" content="Your site name here"/>
<!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
<meta property="og:type" content="website"/> <!-- 'article' for single page  -->
<meta property="og:image"
      content="assets/img/opengraph/fbphoto-476-476.png"/> <!-- when you post this page url in facebook , this image will be shown -->
<!-- facebook open graph ends here -->

<!-- desktop bookmark -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- icons & favicons -->
<link rel="shortcut icon" type="image/x-icon"  href="assets/img/favicon/favicon.ico"/>  <!-- this icon shows in browser toolbar -->
<link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico"/> <!-- this icon shows in browser toolbar -->
<link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
<link rel="manifest" href="assets/img/favicon/manifest.json">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

<!-- Fallback For IE 9 [ Media Query and html5 Shim] -->
<!--[if lt IE 9]>
<script src="assets/vendor/css3-mediaqueries-js/css3-mediaqueries.js"></script>
<![endif]-->

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet" />

<!-- BOOTSTRAP CSS -->
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/vendor/navbar/bootstrap-4-navbar.css" />

<!--Animate css -->
<link rel="stylesheet" href="assets/vendor/animate/animate.css" media="all" />

<!-- FONT AWESOME CSS -->
<link rel="stylesheet" href="assets/vendor/fontawesome/css/font-awesome.min.css" />

<!--owl carousel css -->
<link rel="stylesheet" href="assets/vendor/owl-carousel/owl.carousel.css" media="all" />

<!--Magnific Popup css -->
<link rel="stylesheet" href="assets/vendor/magnific/magnific-popup.css" media="all" />

<!--Nice Select css -->
<link rel="stylesheet" href="assets/vendor/nice-select/nice-select.css" media="all" />

<!--Offcanvas css -->
<link rel="stylesheet" href="assets/vendor/js-offcanvas/css/js-offcanvas.css" media="all" />

<!-- MODERNIZER  -->
<script src="assets/vendor/modernizr/modernizr-custom.js"></script>

<!-- Main Master Style  CSS  -->
<link id="cbx-style" data-layout="1" rel="stylesheet" href="assets/css/style-default.min.css" media="all" />
</head>
<body>

<!--[if lt IE 7]>
<p class="browsehappy">We are Extreamly sorry, But the browser you are using is probably from when civilization started.
    Which is way behind to view this site properly. Please update to a modern browser, At least a real browser. </p>
<![endif]-->

<!--== Header Area Start ==-->
<header id="header-area">
    <div class="preheader-area">
        <div class="container">
            
        </div>
        </div>
    </div>

    <div class="header-bottom-area" id="fixheader">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="main-menu navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index-2.html">
                            <img src="assets/img/logo.png" alt="Logo" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menucontent" aria-controls="menucontent" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="menucontent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item "><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item "><a class="nav-link" href="about.php">About</a></li>
                                <li class="nav-item "><a class="nav-link" href="event.php">Event</a></li>
                                <li class="nav-item "><a class="nav-link" href="gallery.php">Gallery</a></li>
                                <!--Removed Blog and Pages -->
                                <li class='nav-item'><a class='nav-link' href='Library.php'>Library</a></li>
                                <li class="nav-item active"><a class="nav-link" href="contact.php">Contact</a></li>
                                <?php
                                    if(isset($_SESSION['uid'])){
                                        //echo "<li class='nav-item'><a class='nav-link' href='Library.php'>Library</a></li>";
                                        echo '<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="profile.php" data-toggle="dropdown" role="button">Profile</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="profile.php">My Profile</a></li>
                                        <li class="nav-item"><a class="nav-link" href="Updateprofile.php">Update Profile</a></li>
                                        <li class="nav-item"><a class="nav-link" href="ChangePassword.php">Change Password</a></li>
                                        <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                                        
                                    </ul>
                                </li>';
                                    }
                                    else{
                                    echo '<li class="nav-item"><a class="nav-link" href="register.html">Login/SignUp</a></li>';
                                    //echo "<a title='Register' class='btn-auth btn-auth' href='register.html'>Signup</a>"; 
                                    }
                    
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!--== Header Area End ==-->

<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">Contact Us</h1>
                    <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the
                        need</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Contact Page Content Start ==-->
<section id="page-content-wrap">
    <div class="contact-page-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-content-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <!-- Map Area Start -->
                                <div class="map-area-wrap">
                                   <!--  cbx-gmap start
                                    <div id="cbx-gmap">
                                        <div id="map_canvas" class="cbx-map map_canvas" data-lat="44.5403" data-lng="-78.5463" data-title="" data-content="<strong>6H Dilara Tower</strong><br /> <br />77 Bir Uttam C.R. Dutta Road <br /> Dhaka 1205 "></div>
                                    </div>
                                     cbx-gmap end -->
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14234.270708332257!2d75.80526396101929!3d26.88547333752074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db75ff262c22f%3A0x5417b63ec7334276!2sUniversity%20of%20Rajasthan!5e0!3m2!1sen!2sin!4v1593106453592!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                                <!-- Map Area End -->
                            </div>

                            <div class="col-lg-6 m-auto">
                                <div class="contact-form-wrap">
                                  <h3>send message</h3>
                                    <form name="ContactForm" onsubmit="return ValidateContactForm()" action="contact.php" method="POST" >
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                              <label for="cbxname">Name</label>
                                              <input type="text" name="cbxname" required id="cbxname" class="form-control" data-placement="bottom" data-tooltip title="Max length is 50">
                                            </div>
                                          </div>

                                          <div class="col">
                                            <div class="form-group">
                                              <label for="cbxemail">Email</label>
                                              <?php
                                              if(isset($_SESSION['uid']))
                                                {
                                                echo '<input type="email" name="cbxemail" required id="cbxemail" class="form-control " value="'.$uname.'" readonly> ';
                                              }
                                              else
                                              {
                                                echo '<input type="email" name="cbxemail" required id="cbxemail" class="form-control" data-placement="bottom" data-tooltip title="Max length is 50">';  
                                              }
                                              ?>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="cbxsubject">Subjet</label>
                                          <input type="text" name="cbxsubject" required id="cbxsubject" class="form-control" data-placement="bottom" data-tooltip title="Max length is 100">
                                        </div>

                                        <div class="form-group">
                                          <label for="cbxmessage">Message</label>
                                          <textarea name="cbxmessage" id="cbxmessage" rows="10" cols="80" class="form-control" required data-placement="bottom" data-tooltip title="Max length is 100"></textarea>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cbxsendme" name="cbxsendme" value="on" checked="true">
                                            <label class="custom-control-label" for="cbxsendme">Send me a copy</label>
                                        </div>
                                        <input type="Submit" class="btn btn-reg" value="Send" name="Send">
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Contact Page Content End ==-->

<!--== Footer Area Start ==-->
<footer id="footer-area">
    <!-- Footer Widget Start -->
    <div class="footer-widget section-padding">
        <div class="container">
            <div class="row">
                <!-- Single Widget Start -->
                <div class="col-lg-4 col-sm-6">
                    <div class="single-widget-wrap">
                        <div class="widgei-body">
                            <div class="footer-about">
                                <img src="assets/img/footer-logo.png" alt="Logo" class="img-fluid" />
                                <p>We are legend Lorem ipsum dolor sitmet, nsecte ipisicing eit, sed do eiusmod tempor incidunt ut  et do maga aliqua enim ad minim.</p>
                                <a href="#">Phone: +8745 44 5444</a> <a href="#">Fax: +88474 156 362</a> <br> <a href="#">Email: demoemail@demo.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Widget End -->

                <!-- Single Widget Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-widget-wrap">
                        <h4 class="widget-title">Get In Touch</h4>
                        <div class="widgei-body">
                            <p>We are legend Lorem ipsum dolor sitmet, nsecte ipisicing eit, sed</p>
                            <div class="newsletter-form">
                                <form id="cbx-subscribe-form" role="search">
                                    <input type="email" placeholder="Enter Your Email"  id="subscribe" required>
                                    <button type="submit"><i class="fa fa-send"></i></button>
                                </form>
                            </div>
                            <div class="footer-social-icons">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-vimeo"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Widget End -->

                <!-- Single Widget Start -->
                <div class="col-lg-3 col-sm-6">
                    <div class="single-widget-wrap">
                        <h4 class="widget-title">Usefull Link</h4>
                        <div class="widgei-body">
                            <ul class="double-list footer-list clearfix">
                                <li><a href="#">Pricing Plan</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Populer Deal</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Pricing Plan</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Populer Deal</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget End -->

                <!-- Single Widget Start -->
                <div class="col-lg-2 col-sm-6">
                    <div class="single-widget-wrap">
                        <h4 class="widget-title">University</h4>
                        <div class="widgei-body">
                            <ul class="footer-list clearfix">
                                <li><a href="#">Pricing Plan</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Populer Deal</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget End -->
            </div>
        </div>
    </div>
    <!-- Footer Widget End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer-bottom-text">
                        <p>© 2018 Codeboxr, All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->
</footer>
<!--== Footer Area End ==-->

<!--== Scroll Top ==-->
<a href="#" class="scroll-top">
    <i class="fa fa-angle-up"></i>
</a>
<!--== Scroll Top ==-->

<!-- SITE SCRIPT  -->

<!-- Jquery JS  -->
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- POPPER JS -->
<script src="assets/vendor/bootstrap/js/popper.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/navbar/bootstrap-4-navbar.js"></script>

<!--owl-->
<script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>

<!--Waypoint-->
<script src="assets/vendor/waypoint/waypoints.min.js"></script>

<!--CounterUp-->
<script src="assets/vendor/counterup/jquery.counterup.min.js"></script>

<!--isotope-->
<script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>

<!--magnific-->
<script src="assets/vendor/magnific/jquery.magnific-popup.min.js"></script>

<!--Smooth Scroll-->
<script src="assets/vendor/smooth-scroll/jquery.smooth-scroll.min.js"></script>

<!--Jquery Easing-->
<script src="assets/vendor/jquery-easing/jquery.easing.1.3.min.js"></script>

<!--Nice Select -->
<script src="assets/vendor/nice-select/jquery.nice-select.js"></script>

<!--Jquery Valadation -->
<script src="assets/vendor/validation/jquery.validate.min.js"></script>
<script src="assets/vendor/validation/additional-methods.min.js"></script>

<!--off-canvas js -->
<script src="assets/vendor/js-offcanvas/js/js-offcanvas.pkgd.min.js"></script>

<!-- Countdown -->
<script src="assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>

<!-- custom js: main custom theme js file  -->
<script src="assets/js/theme.min.js"></script>

<!-- custom js: custom js file is added for easy custom js code  -->
<script src="assets/js/custom.js"></script>

<!-- custom js: custom scripts for theme style switcher for demo purpose  
<script id="switcherhandle" src="assets/switcher/switcher.js"></script> -->


</body>

<!-- Mirrored from codeboxr.net/themedemo/unialumni/html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 17:11:07 GMT -->
</html>
