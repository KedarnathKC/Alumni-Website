<?php
    session_start();
    require "php/config.php";
    if(isset($_SESSION['uid']))
    {
        $id=$_SESSION['uid'];
        $uname = $_SESSION['username'];
    }
    else{
        echo "<script>alert('Kindly Login First')</script>";
        echo "<script>window.location.href='register.html'</script>";
    }
?>
<script type="text/javascript">
    $(function() {
        $('[data-tooltip]').tooltip({
            animation:true,
            delay:{show:300,hide:500},
            font-size:50,

        });
    });
</script>
<script type="text/javascript">
    function ValidateUpdateForm(){
            
            var email=document.UpdateForm.email.value; //Regular Expression
            var uname=document.UpdateForm.fname.value;   //Length
            var yop=document.UpdateForm.pyear.value;  //current year 
            var mob=document.UpdateForm.mobno.value;  //length
            var cadd=document.UpdateForm.uadd.value; //length
            var oth=document.UpdateForm.other.value; //length
            var desig=document.UpdateForm.desig.value; //length
            var dept=document.UpdateForm.dept.value; //length
            var doj=document.UpdateForm.doj.value; // not greater than current date
            var city=document.UpdateForm.city.value; //length
            var waddr=document.UpdateForm.waddr.value; //length 
            var expertise=document.UpdateForm.expertise.value; //length
            var suggestions=document.UpdateForm.suggestions.value; //length
            
            regExpName=/^[a-zA-Z0-9]{4,20}$/;
            regExpContact=/^[0-9]{10,12}$/;
            //regExpAddress=/^[A-Za-z0-9]{20}$/;
            regExpEmail=/^[a-zA-Z0-9]*[@][a-z]*[.][a-z]{2,4}$/; 
            regExpPass=/^[A-Za-z0-9@$]{6,16}$/;
            
            if(!email.match(regExpEmail))
            {
                //document.getElementById("eml").innerHTML="Please Enter Valid Email id";
                alert("Please Enter Valid Email id");
                return false;   
            }
            if(uname.length>20)
            {
                //document.getElementById("spanName").innerHTML="Maximum allowed length is 20";
                alert("Maximum allowed length for Name is 20!");
                return false;
            }
            var current_year=new Date().getFullYear();
            if(yop>current_year)
            {
                alert("Please Enter Valid Year of Passing");
                return false;
            }
            if(!mob.match(regExpContact))
            {
                //document.getElementById("pass").innerHTML="Please Enter Valid Password";
                alert("Please Enter Valid Mobile Number");
                return false;
            }
            if(cadd.length>100)
            {                
                alert("Maximum allowed length for Correspondance Address is 100!");
                return false;
            }
            if(oth.length>100)
            {                
                alert("Maximum allowed length for Other Examination is 100!");
                return false;
            }
            if(desig.length>15)
            {                
                alert("Maximum allowed length for Designation is 15!");
                return false;
            }
            if(dept.length>20)
            {                
                alert("Maximum allowed length for Department is 20!");
                return false;
            }            
            var doj_date = new Date(doj);
            var today = new Date();
            today.setHours(0,0,0,0);
            if(doj_date>today){
                alert("Please Enter Valid Date of Joining");
                return false;
            }
            if(city.length>20)
            {                
                alert("Maximum allowed length for City is 20!");
                return false;
            }
            if(waddr.length>100)
            {                
                alert("Maximum allowed length for Work Address is 100!");
                return false;
            }
            if(expertise.length>100)
            {                
                alert("Maximum allowed length for Achievements is 100!");
                return false;
            }
            if(suggestions.length>100)
            {                
                alert("Maximum allowed length for Suggestions is 100!");
                return false;
            }            
            return true; 
        }
</script>
<?php
	if(isset($_POST["update"])){
		$email=$_POST["email"];
        $name=$_POST["fname"];
        $yop=$_POST["pyear"];
        if($_POST["optradio"]=="Yes"){
            $privacy="YES";
        }
        else{
            $privacy="NO";
        }
        $tel=$_POST["mobno"];
        $addr=$_POST["uadd"];
        if($_POST["enrol"]=="M.Sc. Student"){
            $enrol="M.Sc. Student";
        }
        else
        {
            $enrol="PhD Student (M.Sc from other University and PhD enrollment from Deptt)";
        }
        if($_POST["phd"]=="Completed"){
            $phd="COMPLETED";
        }
        else if($_POST["phd"]=="Pursuing"){
            $phd="PURSING";
        }
        else{
            $phd="NO";
        }
        $exam=array("ISS"=>"NO","RBI"=>"NO","SO"=>"NO","ASO"=>"NO","SIG1"=>"NO","SIG2"=>"NO","JSO"=>"NO","RA"=>"NO","COMPILER"=>"NO","RSMSSB"=>"NO","OTHER_GOVT"=>"NO","TEACHER"=>"NO","CORPORATE"=>"NO");
        $other=$_POST["other"];
        if($_POST["pwork"]=="Yes"){
            $pwork="YES";
        }
        else{
            $pwork="NO";
        }
        $desig=$_POST["desig"];
        $dept=$_POST["dept"];
        $city=$_POST["city"];   
        $waddr=$_POST["waddr"];
        $achi=$_POST["expertise"];
        $suggest = $_POST["suggestions"];
        foreach($_POST['check'] as $selected) {
            $exam[$selected]="YES";         
        }
        $doj=$_POST["doj"];
        //upload file
        $update="Update info i join ex_pass e on (i.id=e.id) SET
        	i.Enrollment_in_Dept='$enrol',
            i.Year_Of_Passing='$yop',
        	i.Mob_Privacy='$privacy',
        	i.Mob_Number='$tel',
        	i.Correspondance_Address='$addr',
        	i.PhD_Status='$phd',
        	i.Work_Status='$pwork',
        	i.Designation='$desig',
        	i.Work_Place_Name='$dept',
        	i.Working_Since='$doj',
        	i.Work_City='$city',
        	i.Work_Address='$waddr',
        	i.Achievements='$achi',
            i.Suggestions ='$suggest',
        	e.OTHER='$other',
        	e.ISS='$exam[ISS]',
        	e.RBI='$exam[RBI]',
        	e.SO='$exam[SO]',
        	e.ASO='$exam[ASO]',
        	e.SIG1='$exam[SIG1]',
        	e.SIG2='$exam[SIG2]',
        	e.JSO='$exam[JSO]',
        	e.RA='$exam[RA]',
        	e.COMPILER='$exam[COMPILER]',
        	e.RSMSSB='$exam[RSMSSB]',
        	e.OTHER_GOVT='$exam[OTHER_GOVT]',
        	e.TEACHER='$exam[TEACHER]',
        	e.CORPORATE='$exam[CORPORATE]'
        where i.id=$id
        ";
        if(!mysqli_query($dbhandle,$update)){
        	echo mysqli_error($dbhandle);
            echo "<script>alert('Unable to Update')</script>";
            echo "<script> window.location.href='Updateprofile.php'</script>";   
        }
        else{
        	echo "<script>alert('Successfull');</script>";
			echo "<script>window.location.href='profile.php'</script>";
        }
	}
?>
<?php
	$get="select * from credentials c,info i,ex_pass e where c.id=i.id and c.id=e.id and c.id=$id";
	$ex_get=mysqli_query($dbhandle,$get);
	if(mysqli_num_rows($ex_get)==1){
		$row=mysqli_fetch_assoc($ex_get);
		$email=$row['username'];
		$name=$row["Name"];
        $dept_enrol=$row["Enrollment_in_Dept"];
        //echo "<script>alert('$dept_enrol')</script>";
		$yop=$row["Year_Of_Passing"];
		$Mob_Number=$row["Mob_Number"];
		$Correspondance_Address=$row["Correspondance_Address"];
		$PhD_Status=$row["PhD_Status"];
		$Designation=$row["Designation"];
		$Work_Place_Name=$row["Work_Place_Name"];
		$Working_Since=$row["Working_Since"];
		$Work_City=$row["Work_City"];
		$Work_Address=$row["Work_Address"];
		$Achievements=$row["Achievements"];
        $Suggestions = $row["Suggestions"];
		$Others=$row["OTHER"];
		if($row["Mob_Privacy"]=="YES"){
			$Mob_Privacy1="checked";
			$Mob_Privacy2="";
		}
		else{
			$Mob_Privacy2="checked";
			$Mob_Privacy1="";
		}
        if($dept_enrol=="M.Sc. Student"){
            $enrol1="checked";
            $enrol2="";
        }
        else{
            $enrol1="";
            $enrol2="checked";
        }
        //echo "<script>alert('$enrol1')</script>";
        //echo "<script>alert('$enrol2')</script>";
		if($row["Work_Status"]=="YES"){
			$Work_Status1="checked";
			$Work_Status2="";
		}
		else{
			$Work_Status2="Checked";
			$Work_Status1="";
		}
		$ISS=$RBI=$SO=$ASO=$SIG1=$SIG2=$JSO=$RA=$COMPILER=$RSMSMB=$OTHER_GOVT=$TEACHER=$CORPORATE="";
		if($row["ISS"]=="YES"){
			$ISS="checked";
	
		}
		if($row["RBI"]=="YES"){
			$RBI="checked";
		}
		if($row["SO"]=="YES"){
			$SO="checked";
		}
		if($row["ASO"]=="YES"){
			$ASO="checked";
		}
		if($row["SIG1"]=="YES"){
			$SIG1="checked";
		}
		if($row["SIG2"]=="YES"){
			$SIG2="checked";
		}
		if($row["JSO"]=="YES"){
			$JSO="checked";
		}
		if($row["RA"]=="YES"){
			$RA="checked";
		}
		if($row["COMPILER"]=="YES"){
			$COMPILER="checked";
		}
		if($row["RSMSSB"]=="YES"){
			$RSMSMB="checked";
		}
		if($row["OTHER_GOVT"]=="YES"){
			$OTHER_GOVT="checked";
		}
		if($row["TEACHER"]=="YES"){
			$TEACHER="checked";
		}
		if($row["CORPORATE"]=="YES"){
			$CORPORATE="checked";
		}
		$phd1=$phd2=$phd3="";
		if($row["PhD_Status"]=="COMPLETED")
			$phd1="Checked";
		else if($row["PhD_Status"]=="Pursuing")
			$phd2="Checked";
		else
			$phd3="Checked";
		
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
                                        
                                            <div class="register-form-wrap">
                                                <h3>Profile Page</h3>
                                                <div class="register-form">
								<form name = "UpdateForm" onsubmit="return ValidateUpdateForm()" method="POST" action="UpdateProfile.php" enctype="multipart/form-data">
									<div class="row">
								        <div class="col-12 col-sm-6">
								            <div class="form-group">
								                <label for="register_email">Email</label>
								                <?php
								                echo "<input type='email' class='form-control' id='register_email' name='email' value='".$email."' required  readonly/>";
								                ?>
								            </div>
								        </div>

								        <div class="col-12 col-sm-6">
								            <div class="form-group">
								            	<label for="register_name">Name</label>
								            	<?php
								            	echo "<input type='text' class='form-control' id='register_name' name='fname' value='".$name."' required readonly/>";  
												?>                               
											</div>
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-12 ">
                                            <div class="form-group">
                                                <label for="register_yop">Enrollment in the Department</label>
                                                <br>
                                                <?php
                                                echo "
                                                <input type='radio' id='yes' name='enrol' value='M.Sc. Student' required ".$enrol1.">";
                                                ?>
                                                <label for="M.Sc. Student">M.Sc. Student</label>
                                                <br>
                                                <?php
                                                echo "
                                                <input type='radio' id='yes' name='enrol' value='PhD Student (M.Sc from other University and PhD enrollment from Deptt)' required ".$enrol2.">";
                                                ?>
                                                <label for="PhD Student (M.Sc from other University and PhD enrollment from Deptt)">PhD Student(M.Sc from other University and PhD enrollment from Deptt)</label>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label for="register_yop">Year of Passing</label>
												<?php
												echo "<input type='text' class='form-control' id='register_yop' name='pyear' value='".$yop."' required  />";
												?>
											</div>
										</div>
										<div class="col-12 col-sm-6">
											<div class="form-group">
												<label for="register_mno">Mobile Number</label>
												<?php
												echo "
												<input type='text' class='form-control' id='register_mno' name='mobno' value='".$Mob_Number."' data-tooltip title='For outside India, Kindly add country code without + sign' required/>";
												?>
											</div>
										</div>
									</div>
									<div class="row">                               
										<div class="col-12">
											<div class="form-group">
												<label for="register_mper">Do you want to share your contact details with others</label>  
												<?php
												echo "
												<input type='radio' id='yes' name='optradio' value='Yes'  required ".$Mob_Privacy1.">";
												?>
												<label for="male">Yes</label>
												<?php
												echo "
												<input type='radio' id='no' name='optradio' value='No'  required ".$Mob_Privacy2.">";
												?>
												<label for="female">No</label>     
											</div>
											<div class="row">                               
												<div class="col-12">
													<div class="form-group">
														<label for="register_cadd">Correspondance Address</label>
														<?php
														echo "<textarea class='form-control' rows='3' id='comment'  name='uadd' data-placement='bottom' data-tooltip title='Max length is 100' required>".$Correspondance_Address."</textarea>";
														?>
													</div>
													<div class="row">                   
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label for="register_phd">PHD Scholar</label><br>
								                                    <label class="radio-inline">
								                                    	<?php
								                                    	echo "
								                                    	<input type='radio' name='phd' value='Completed' required ".$phd1.">";
								                                    	?>
								                                    	Completed
								                                    </label>
								                                    <label class="radio-inline">
								                                    	<?php
								                                    	echo "
								                                    	<input type='radio' name='phd' value='Pursuing' ".$phd2.">";
								                                    	?>
								                                    	Pursuing
								                                    </label>
								                                	<label class="radio-inline">
								                                		<?php
								                                		echo "
								                                		<input type='radio' name='phd' value='No' ".$phd3.">";
								                                		?>
								                                	No</label>
								                            </div>
								                        </div>
								                        <div class="col-12 col-sm-6">
								                        	<div class="form-group">
								                        		<label for="register_pw">Presently Working</label><br>
																	<label class="radio-inline">
																	<?php
																	echo "
																		<input type='radio'  required name='pwork' value='Yes' ".$Work_Status1.">";
																	?>

																		Yes
																	</label>
																	<label class="radio-inline">
																	<?php
																	echo "
																		<input type='radio'  required name='pwork' value='No' ".$Work_Status2.">";
																	?>
																	No
																	</label>
																</div>
															</div>                      
														</div>
														<div class="row">                  
															<div class="col-12">
																<div class="form-group">
																	<label for="register_ep">Examinations Passed</label><br>
																	<label class="form-check-inline">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='ISS'".$ISS.">";
																		?>
																		ISS (Indian Statistical Services)
																	</label>
																	<label class="form-check-inline" style="margin-left: 60px;">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='RBI'".$RBI.">";
																		?>
																		RBI (Reserve Bank of India)
																	</label>
																	<label class="form-check-inline" style="margin-left: 80px;">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='SO'".$SO.">";
																		?>
																		SO (Statistical Officer)
																	</label>
																	<br>
																	<label class="form-check-inline" >
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='ASO'".$ASO.">";
																		?>
																		ASO (Assistant Statistical Officer)							
																	</label>
																	<label class="form-check-inline" style="margin-left: 44px;">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='SIG1'".$SIG1.">";
																		?>
																		SI - Grade I (Statistical Investigator)
																	</label>
																	<label class="form-check-inline" style="margin-left: 28px;">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='SIG2'".$SIG2.">";
																		?>
																		SI - Grade II (Statistical Investigator)
																	</label>
																	<br>
																	<label class="form-check-inline">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='JSO'".$JSO.">";
																		?>
																		JSO (Junior Statistical Officer)
																	</label>
																	<label class="form-check-inline" style="margin-left: 65px;">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='RA'".$RA.">";
																		?>Research Assistant
																	</label>
																	<label class="form-check-inline" style="margin-left: 130px;">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='COMPILER'".$COMPILER.">";
																		?>
																		Compiler
																	</label>
																	<br>
																	<label class="form-check-inline" >
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='RSMSMB'".$RSMSMB.">";
																		?>
																		RSMSSB Computor
																	</label>
																	<label class="form-check-inline" style="margin-left: 135px;">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='OTHER_GOVT'".$OTHER_GOVT.">";
																		?>
																		Other Government Services
																	</label>
																	<label class="form-check-inline" style="margin-left: 79px;">
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='TEACHER'".$TEACHER.">";
																		?>Teacher/Professor
																	</label>
																	<br>
																	<label class="form-check-inline" >
																		<?php
																		echo "
																		<input type='checkbox' name='check[]' value='CORPORATE'".$CORPORATE.">";
																		?>
																		Corporate Sector
																	</label>
																	<br>
																	<label for="register_name">Others</label>
																	<?php
																	echo "
																	<input type='text' class='form-control' id='register_name' name='other' value='".$Others."' required/>";
																	?>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label for="register_dcp">Designation</label>
																	<?php
																	echo "
																	<input type='text' data-tooltip title='Designation of Current Posting' class='form-control' value='".$Designation."' id='register_dcp' name='desig' required />";
																	?>
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group" >
																	<label for="register_name" >Deptt/Institution</label>
																	<?php
																	echo "
																	<input type='text' data-tooltip title='Deptt/Institute of Current Posting' class='form-control' value='".$Work_Place_Name."' id='register_name' required name='dept' required/>";
																	?>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-12 col-sm-6">
																<div class="form-group">
																	<label for="register_name">Working Since</label>
																	<?php
																	echo "
																	<input type='date' data-tooltip title='Working in Current Job Since' class='form-control' id='register_name' name='doj' value='".$Working_Since."'  required />";
																	?>
																</div>
															</div>
															<div class="col-12 col-sm-6">
																<div class="form-group" >
																	<label for="register_name" >Center/City</label>
																	<?php
																	echo "
																	<input type='text' data-tooltip title='Center/City of Current Posting' class='form-control' id='register_name' name='city' value='".$Work_City."' required />";
																	?>
																</div>
															</div>
														</div>
														<div class="row">               
															<div class="col-12">
																<div class="form-group">
																	<label for="register_cadd">Work Address</label>
																	<?php
																	echo "
																	<textarea class='form-control' rows='3' id='comment'  name='waddr' data-tooltip title='Max length is 100' required>".$Work_Address."</textarea>";
																	?>
																</div>
																<div class="row">       
																	<div class="col-12">
																		<div class="form-group">
																			<label for="register_cadd">Achievements/Area of Expertise</label>
																			<?php
																			echo "
																			<textarea class='form-control' rows='2' id='comment'  name='expertise' data-tooltip title='Max length is 100' required>".$Achievements."</textarea>";
																			?>  
								                                        </div>
                                                                        <div class="row">       
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="register_cadd">Suggestions</label>
                                                                            <?php
                                                                            echo "
                                                                            <textarea class='form-control' rows='3' id='comment'  name='suggestions' data-tooltip title='Max length is 100' required>".$Suggestions."</textarea>";
                                                                            ?>  
                                                                        </div>
								                                        <!--<div>
								                                        	<input type="file" required name="img" accept="image/*">
																			<label class="custom-file" for="customfile"><i class="fa fa-upload"></i>Upload Your Photo</label>
																		</div>-->
																		<input type="submit" class="btn btn-reg" value="Update" name="update">
								                                    </div>
								                                </div>
								                            </div>
								                        </div>
								                    </div>
								                </div>
								            </div>
								        </div>
								</form> 

							 </div>
                                            </div>
                                       
                                        <!-- Regsiter Form Area End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Register Page Content End ==-->

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