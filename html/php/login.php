<?php
	session_start();
	require "config.php";
	if(isset($_POST['submit'])){
		$uname=$_POST['email'];
		$pass=sha1($_POST['pass']);

		if($uname == "alumnidosuor@gmail.com" and $pass == sha1("admin123"))
		{
			$_SESSION['uid']="admin";
			$_SESSION['username']="admin";
			echo "<script>window.location.href='../Admin_dashboard.php'</script>";

		}
		else{
			$query="Select * from credentials where username='$uname' and password='$pass'";
			//$q=mysqli_query($dbhandle,$query);
			$result = mysqli_query($dbhandle, $query) or die('Error ' . mysqli_error($dbhandle));
	    	$row = mysqli_fetch_array($result);
			if(mysqli_num_rows($result)>0){
				//echo "<script>window.location.href='../index.php'</script>";
				$uid = $row['id'];
				$_SESSION['uid']=$uid;
				$_SESSION['username']=$uname;
				echo "<script>window.location.href='../index.php'</script>";

			}
			else{
				echo "<script>alert('credentials doesn\'t match')</script>";
				echo "<script>window.location.href='../register.html'</script>";
			}	
		}
		

	}

?>