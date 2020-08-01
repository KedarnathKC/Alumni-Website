<?php
    session_start();
    require "php/config.php";
    if(isset($_SESSION['uid']))
    {
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['username'];
    }
    
    if(isset($_POST['view'])){
        $email=$_POST['mail'];
        $sql_id = "select * from credentials where username = '$email'";
        $result_id = mysqli_query($dbhandle,$sql_id) or die('Error 1' . mysqli_error($dbhandle));
        $cred_row = mysqli_fetch_assoc($result_id);
        $id = $cred_row['id'];
        
        $sql = "select * from info where id=$id"; // change this id as per your need
        
        $sql_exam = "select * from ex_pass where id = $id";
        $result_exam = mysqli_query($dbhandle,$sql_exam) or die('Error '. mysqli_error($dbhandle));
        $exam_row = mysqli_fetch_assoc($result_exam);
        //$email = mysql_fetch_object($result_email);
        $result = mysqli_query($dbhandle, $sql) or die('Error 3' . mysqli_error($dbhandle));
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from codeboxr.net/themedemo/unialumni/html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 17:10:11 GMT -->
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

<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
    $(function() {
        $('[data-tooltip]').tooltip();
    });
    function removeReadOnly(){
        document.getElementById('name').removeAttribute('readonly');
    }
    
</script>
<style type="text/css">
    .content-table{
        border-collapse: collapse;
        margin: 5px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
        
    }
    .content-table td{
        padding: 8px 10px;

    }
    .content-table tbody tr{
        border-bottom: 1px solid #dddddd;

    }
    .content-table tbody tr:nth-child(even){
        background-color: #f5f5f5;
    }
</style>
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
            <div class="row">
                <div class="col-lg-6 col-sm-7 col-7">
                    <div class="preheader-left">
                        <a href="mailto:info@construc.com"><strong>Email:</strong> alumnidosuor@gmail.com
</a>
                        <a href="mailto:info@construc.com"><strong>Hotline:</strong> 8003079097</a>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-5 col-5 text-right">
                    <div class="preheader-right">
                        <?php
                        if(isset($_SESSION['uid'])){
                            echo "<b> Welcome: ".strtoupper($uname)."</p>";
                        
                            echo "<a title='Logout' class='btn-auth btn-auth-rev' href='logout.php'>Logout</a>";
                        }
                        else{
                            echo "<a title='Login' class='btn-auth btn-auth-rev'     href='register.html'>Login</a>";
                            echo "<a title='Register' class='btn-auth btn-auth' href='register.html'>Signup</a>"; 
                        }
                    ?>
                    </div>
                </div>
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
                                 <li class="nav-item active"><a class="nav-link" href="Admin_dashboard.php">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="ALibrary.php">Upload</a></li>
                                <li class="nav-item"><a class="nav-link" href="AdminLibrary.php">Library</a></li>
                                <li class="nav-item"><a class="nav-link" href="Admin_Event.php">Events</a></li> 
                                <li class="nav-item "><a class="nav-link" href="Event_Details.php">Event Details</a></li>
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
                        <h1 class="h2">Profile Page</h1>
                        <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need</p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Register Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="register-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="register-page-inner">
                            <div class="col-lg-10 m-auto">
                                <div class="register-form-content">
                                    <div class="row">
                                        <div style="float: left;width: 700px;">
                                                <b>
                                                <table class="content-table">
                                                    <tbody>
                                                        <tr>
                                                        <td>Name:</td>
                                                        <td><?php echo strtoupper($row['Name']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td><?php echo $email; ?></td>
                                                    </tr>
                                                     <tr>
                                                        <td>Enrollment in Dept:</td>
                                                        <td><?php echo $row['Enrollment_in_Dept']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Year of Passing:</td>
                                                        <td><?php echo $row['Year_Of_Passing']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Privacy :</td>
                                                        <td><?php echo strtoupper($row['Mob_Privacy']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number :</td>
                                                        <td><?php echo $row['Mob_Number']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Correspondance Address :</td>
                                                        <td><?php echo strtoupper($row['Correspondance_Address']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>PhD Status :</td>
                                                        <td><?php echo strtoupper($row['PhD_Status']); ?></td>
                                                    </tr>
                                                    <tr >
                                                        <td>Currently Working :</td>
                                                        <td><?php echo strtoupper($row['Work_Status']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Designation : </td>
                                                        <td><?php echo strtoupper($row['Designation']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Work Place Name :</td>
                                                        <td><?php echo strtoupper($row['Work_Place_Name']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Working Since :</td>
                                                        <td><?php echo strtoupper($row['Working_Since']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Work City :</td>
                                                        <td><?php echo strtoupper($row['Work_City']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Work Address :</td>
                                                        <td><?php echo strtoupper($row['Work_Address']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Achievements :</td>
                                                        <td><?php echo strtoupper($row['Achievements']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Suggestions :</td>
                                                        <td><?php echo strtoupper($row['Suggestions']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Exam Passed :</td>
                                                        <td>
                                                            <ul>
                                                            <?php
                                                                //echo implode(" ",$exam_row)."<br>";
                                                                foreach ($exam_row as $key => $value) {
                                                                if($value=="YES")
                                                                {
                                                                    echo "<li>".$key."</li> ";
                                                                    //echo $key . " : " . $value . "<br>";
                                                                }
                                                                }?></ul></td>
                                                    </tr>
                                                    
                                                    </tbody>                                                    
                                                </table>
                                            </b>
                                        </div>
                                        <div style="float: right;">                                            
                                            <?php 
                                                if($row['Image']!='')
                                                {
                                                    echo '<img height = 300 width = 200 src="data:image/jpeg;base64,'.base64_encode($row['Image']).'"/>';         
                                                }
                                                else
                                                    echo '<img height = 300 width = 200 src = "Display.jpg"/>';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

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

<!-- Mirrored from codeboxr.net/themedemo/unialumni/html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 17:10:11 GMT -->
</html>
