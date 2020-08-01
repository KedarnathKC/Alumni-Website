<?php
    session_start();

    if(isset($_SESSION['uid']))
    {
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['username'];
    }


	require "php/config.php";
	$get_yop="select DISTINCT(Year_Of_Passing) from info";
	$ans_yop=mysqli_query($dbhandle,$get_yop) or die("Unable to fetch".mysqli_error($dbhandle));
	$get_city="select DISTINCT(Work_City) from info";
	$ans_city=mysqli_query($dbhandle,$get_city) or die("Unable to fetch".mysqli_error($dbhandle));
	$get_work_place="select DISTINCT(Work_Place_Name) from info";
	$ans_work_place=mysqli_query($dbhandle,$get_work_place) or die("Unable to fetch".mysqli_error($dbhandle));

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   <title>Admin Dashboard</title>

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
<link rel="stylesheet" href="assets/css/style.css"  />
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
</script>
</head>
<body>
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
                        <h1 class="h2">Dashboard</h1>
                        <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need</p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                    </div>
                </div>
            </div>
        </div>
    </section>  
<section id="main-dashboard">  
	<h4><center><b>SEARCH</b></center></h4>
	<form method="POST" action="Admin_dashboard.php">
	<div id="question">
		<div id="select-area">
			<div id='select-label'>
				<div class="select-title">
					<label><b>Year Of Passing</b></label>
				</div>
				<div class="select-title">
					<label><b>Work City</b></label>
				</div>
				<div class="select-title">
					<label><b>Work Place Name</b></label>
				</div>
			</div>
		<?php	
			
			echo '<div class="select-sort">';
				echo "<select name='yop'>";
						echo "<option value=' ' disabled selected hidden> </option>";
					while($r=mysqli_fetch_assoc($ans_yop)){
						echo "<option value='".$r["Year_Of_Passing"]."'>".$r["Year_Of_Passing"]."</option>";
					}
				echo "</select>";
			echo "</div>";
			
			echo '<div class="select-sort">';
				echo "<select name='city'>";
					echo "<option value=' ' disabled selected hidden> </option>";
					while($r=mysqli_fetch_assoc($ans_city)){
						echo "<option value='".$r["Work_City"]."'>".$r["Work_City"]."</option>";
						}
				echo "</select>";
			echo "</div>";
			echo '<div class="select-sort">';
				
				echo "<select  name='place'>";
					echo "<option value=' ' disabled selected hidden> </option>";
					while($r=mysqli_fetch_assoc($ans_work_place)){
						echo "<option value='".$r["Work_Place_Name"]."'>".$r["Work_Place_Name"]."</option>";
					}
				echo "</select>";
			echo "</div>";
		?>
		</div>
		<div id="check-area">
			<div id='check-label'>
				<div class="check-title">
					<label><b>Year Of Passing</b></label>
				</div>	
			</div>
			<div class="check-sort">
				<label class="containers">Indian Statistical Services
					<input type="checkbox" name="achi[]" value="ISS">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Reserve Bank of India
					<input type="checkbox" name="achi[]" value="RBI">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Statistical Officer
					<input type="checkbox" name="achi[]" value="SO">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Assistant Statistical Officer
					<input type="checkbox" name="achi[]" value="ASO">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Research Assistant
					<input type="checkbox" name="achi[]"  value="RA">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Statistical Investigator - Grade I
					<input type="checkbox" name="achi[]" value="SIG1">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Statistical Investigator - Grade II
					<input type="checkbox" name="achi[]" value="SIG2">
					<span class="checkmark"></span>
				</label>	
				
			</div>
			<div class="check-sort">
			<label class="containers">Junior Statistical Officer
					<input type="checkbox" name="achi[]" value="JSO">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Compiler
					<input type="checkbox" name="achi[]" value="COMPILER">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">RSMSSB Computor
					<input type="checkbox" name="achi[]" value="RSMSSB">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Other Government Services
					<input type="checkbox" name="achi[]" value="OTHER_GOVT">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Teacher/Professor
					<input type="checkbox" name="achi[]" value="TEACHER">
					<span class="checkmark"></span>
				</label>	
				<label class="containers">Corporate
					<input type="checkbox" name="achi[]" value="CORPORATE">
					<span class="checkmark"></span>
				</label>	
			</div>
		</div>
		<div id="submit-region">
			<center><input type="Submit" class="btn btn-reg" name="search" value="Search"></center>
		</div>
		
	</form>
	</div>
	<div id="answer">
		<div id='answer-label'>
			<div class="answer-title">
				<label><b>Result</b></label>
			</div>	
		</div>	
		<?php
	if(isset($_POST['search'])){
		$a=0;
		$y=0;
		$c=0;
		$w=0;
		$get="select c.username,i.name,i.mob_number from credentials c,info i,ex_pass e where c.id=i.id and c.id=e.id";
		$exam=array("ISS"=>"NO","RBI"=>"NO","SO"=>"NO","ASO"=>"NO","SIG1"=>"NO","SIG2"=>"NO","JSO"=>"NO","RA"=>"NO","COMPILER"=>"NO","RSMSSB"=>"NO","OTHER_GOVT"=>"NO","TEACHER"=>"NO","CORPORATE"=>"NO");
		if(isset($_POST['achi'])){
			$a=1;
			foreach($_POST['achi'] as $selected) {
				if($selected!=" ")
			        $get.=" and e.".$selected."='YES'";         
		    }
		}
		
	    if(isset($_POST['yop'])){
	    	$y=1;
	    	if( $_POST['yop']!=" " ){
        		$get.=" and i.Year_Of_Passing='$_POST[yop]'";
        	}	
	    }
        if(isset($_POST['city'])){
        	$c=1;
	        if($_POST['city']!=" " ){
	        	$get.=" and i.Work_City='$_POST[city]'";
	        }
	    }
	    if( isset($_POST['place'])) {
	    	$w=1;
        	if($_POST['place']!=" " ){
        		$get.=" and i.Work_Place_Name='$_POST[place]'";
        	}
        }
        
        if($a==0 && $y==0 && $c==0 && $w==0){
			echo "<div id='no-ans'><center>Kindly choose anything before you submit</center>";
			echo "</div>";
		}
		else{
			$ans=mysqli_query($dbhandle,$get) or die(mysqli_error($dbhandle));
	        if(mysqli_num_rows($ans)>0){
	        	echo "<table id='customers'>";
	        		echo "<tr>";
	        			echo "<th class='name'>Name</th>";
	        			echo "<th class='mail'>Email-Id</th>";
	        			echo "<th class='phno'>Phone Number</th>";
	        			echo "<th class='sub'>View Profile</th>";
	        		echo "</tr>";
		        	while($row=mysqli_fetch_assoc($ans)){

		        		echo "<tr>";
		        			echo "<form action='ViewProfile.php' method='POST'>";
			        			echo "<td class='name'>".strtoupper($row['name'])."</td>";
		        				echo "<input type='hidden' name='mail' value='".$row['username']."'>";
		        				echo "<td class='mail'>".$row['username']."</td>";
			        			echo "<td class='phno'>".$row['mob_number']."</td>";
								echo "<td class='sub'><input type='Submit' name='view' value='View Profile'></td>";
		        			echo "</form>";
		        		echo "</tr>";
		        	}
				echo "</table>";	        	
	        }
	        else{
	        	echo "<div id='no-ans'><center>No Such User</center>";
				echo "</div>";
	        }
		}
	}
	else{
		echo "<div id='no-ans'><center>Result will appear here after you submit the query</center>";
		echo "</div>";
	}
?>
	</div>

</section>
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("select-sort");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
<!--== Footer Area End ==-->
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

<!--== Scroll Top ==-->
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
