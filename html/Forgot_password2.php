<script type="text/javascript">
    $(function() {
        $('[data-tooltip]').tooltip({
            animation:true,
            delay:{show:300,hide:500},
            font-size:50,

        });
    });
</script>
<?php
    session_start();
    require "php/config.php";
    $generator = "1357902468"; 
    $result = ""; 
    
    for ($i = 1; $i <= 6; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    }
    function sendOTP($otp,$body,$to_email){
        $subject = "OTP for forgot pass";
        $body = $otp;
        $headers = "From: alumnidosuor@gmail.com";
        if (mail($to_email, $subject, $body, $headers)) {
            return 1;
        } 
        else{
            /*
            $a=sendOTP($otp,$body,$to_email);
            return 1;*/
            echo "<script>alert('Couldn\'t send the mail.. Kindly try again' )</script>";
            echo "<script>window.location.href='register.html'</script>";
        }             
    }
    if(isset($_POST['forgot_pass'])){
        $id=$_SESSION['otp_id'];
        $email=$_POST['email'];
        $npass1=sha1($_POST['npass1']);
        $npass2=sha1($_POST['npass2']);
        if(strcmp($npass1,$npass2)==0){
            $update="update credentials set password='$npass1' where username='$email'";
            if(mysqli_query($dbhandle,$update)){
                echo "<script>alert('Password Succesfully Updated')</script>";
                echo "<script>window.location.href='register.html'</script>";
            }
            else{
                echo "<script>alert('Couldn\'t update the password.. Kindly try again' )</script>";
                echo "<script>window.location.href='register.html'</script>";
            }
        }
        else{
            echo "<script>alert('Your confirm new password doesn\'t match with the new password')</script>";
            echo "<script>window.location.href='register.html'</script>";
        }
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from codeboxr.net/themedemo/unialumni/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 17:06:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

<!--[if lt IE 7]>
<p class="browsehappy">We are Extreamly sorry, But the browser you are using is probably from when civilization started. Which is way behind to view this site properly. Please update to a modern browser, At least a real browser. </p>
<![endif]-->

    <!--== Header Area Start ==-->
<header id="header-area">
    <div class="preheader-area">
        <div class="container">
            
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
                                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="event.php">Event</a></li>
                                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                                <!--Removed Blog and Pages -->
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                <?php
                                    if(isset($_SESSION['uid'])){
                                        echo "<li class='nav-item'><a class='nav-link' href='Library.php'>Library</a></li>";
                                        //echo "<li class='nav-item active'><a class='nav-link' href='profile.php'>Profile</a></li>";
                                        echo '<li class="nav-item dropdown active">
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
<section id="page-content-wrap">
        <div class="register-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="register-page-inner">
                            <div class="col-lg-10 m-auto">
                                <div class="register-form-content">
                                <div class="forgot-pass">
                                    <h4>Forgot Password</h4>
                                    <form action="Forgot_password2.php" method="POST" ><!--action="https://codeboxr.net/themedemo/unialumni/html/index.html"-->
                                        
                                        <?php
                                            if(isset($_POST['forgot_email'])){
                                                $email=$_POST['email'];
                                                $check_email="select * from credentials where username='$email'";
                                                if(mysqli_num_rows(mysqli_query($dbhandle,$check_email))<=0){
                                                    echo "<script>alert('No such email registered')</script>";
                                                    echo "<script>window.location.href='Forgot_password1.php'</script>";
                                                }
                                                else{
                                                    $row=mysqli_fetch_assoc(mysqli_query($dbhandle,$check_email));
                                                    $uid=$row['id'];
                                                    $_SESSION['otp_id']=$uid;
                                                    $sha_result=sha1($result);
                                                    $body="Your OTP for forgot password is ".$result;
                                                    if(sendOTP($result,$body,$email)==1){
                                                        $id=$_SESSION['otp_id'];
                                                        $check_otp="select * from otp_verification where id=$id";
                                                        if(@mysqli_num_rows(mysqli_query($dbhandle,$check_otp))>0){
                                                            $del_otp="delete from otp_verification where id=$id";
                                                            mysqli_query($dbhandle,$del_otp) or die("Sorry ..");
                                                        }
                                                        $in_otp="insert into otp_verification values($uid,'$sha_result')";
                                                        if(mysqli_query($dbhandle,$in_otp)){
                                                            echo "<input type='hidden' name='email' value='".$email."' ><br><br>";
                                                            echo "<input type='password' placeholder='Enter the OTP sent to the registered mail' name='mail_OTP' data-tooltip title='Enter the OTP sent to your registered mail id!' required><br><br>";
                                                            echo "<center><button type='submit' class='btn btn-reg' name='forgot_OTP'>SUBMIT</button></center>";
                                                        }
                                                        else{
                                                            echo "<script>alert('Sorry1.. Try again')</script>";
                                                            echo "<script>window.location.href='register.html'</script>";
                                                        }
                                                    }
                                                }
                                            }
                                            
                                        ?>
                                        <?php
                                            if(isset($_POST['forgot_OTP'])){
                                                $id=$_SESSION['otp_id'];
                                                $mail_OTP=sha1($_POST['mail_OTP']);
                                                $email=$_POST['email'];
                                                
                                                $get_OTP="select * from OTP_Verification where id=$id";
                                                $otp_result=mysqli_query($dbhandle,$get_OTP);
                                                if(mysqli_num_rows($otp_result)==1){
                                                    
                                                    $row1=mysqli_fetch_assoc($otp_result);
                                                    $otp_db=$row1['otp'];
                                                    if(strcmp($mail_OTP,$otp_db)==0){
                                                        echo "<input type='text' name='email' value='".$email."'readonly><br><br>";
                                                        echo "<input type='password' placeholder='New Password' name='npass1' required><br><br>";
                                                        echo "<input type='password' placeholder='New Password' name='npass2' required><br><br>";
                                                        echo "<button type='submit' class='btn btn-reg' name='forgot_pass'>SUBMIT</button>";
                                                    }
                                                    else{
                                                        echo "<script>alert('You have entered the wrong OTP')</script>"; 
                                                        echo "<script>window.location.href='register.html'</script>";    
                                                      
                                                    }
                                                }
                                                else{
                                                    echo "<script>alert('Sorry couldn\'t process your request now')</script>";
                                                    echo "<script>window.location.href='register.html'</script>";
                                                    
                                                }
                                            }
                                                                
                                        ?>
                                                
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

<!-- custom js: custom scripts for theme style switcher for demo purpose  -->
<script id="switcherhandle" src="assets/switcher/switcher.js"></script>


</body>

<!-- Mirrored from codeboxr.net/themedemo/unialumni/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 17:09:43 GMT -->
</html>
