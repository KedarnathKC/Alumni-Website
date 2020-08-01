<?php
	require "config.php";
	if(isset($_POST["regi"])){
		$email=$_POST["email"];
		$name=$_POST["fname"];
		$yop=$_POST["pyear"];
		if($_POST["optradio"]=="Yes"){
			$privacy=1;
		}
		else{
			$privacy=0;
		}
		$tel=$_POST["mobno"];
		$addr=$_POST["uadd"];
		if($_POST["phd"]=="Completed"){
			$phd=1;
		}
		else if($_POST["phd"]=="Pursuing"){
			$phd=2;
		}
		else{
			$phd=0;
		}
		$exam=array("ISS"=>0,"RBI"=>0,"So"=>0,"ASO"=>0,"Si1"=>0,"si2"=>0,"jso"=>0,"ra"=>0,"compiler"=>0,"rsmssb"=>0,"other_govt"=>0,"tr"=>0,"corp"=>0);
		print_r($exam);
		echo "<br>";
		$other=$_POST["other"];
		if($_POST["pwork"]=="Yes"){
			$pwork=1;
		}
		else{
			$pwork=0;
		}
		$desig=$_POST["desig"];
		$dept=$_POST["dept"];
		$city=$_POST["city"];	
		$waddr=$_POST["waddr"];
		$achi=$_POST["expertise"];		
		foreach($_POST['check'] as $selected) {
			$exam[$selected]=1;			
		}
		print_r($exam);
		$img_name = $_FILES['img']['name'];
		$doj=$_POST["doj"];
		//upload file
		if($img_name!='')
		{
			$ext = pathinfo($img_name,PATHINFO_EXTENSION);
			$allowed = ['png','jpg','jpeg'];

			//check if it is a valid img type
			if ( in_array($ext, $allowed))
			{
				//$created = @date('Y-m-d H:i:s');

				//read image data into a variable for inserting
				$img_data = addslashes(file_get_contents($_FILES['img']['tmp_name']));


			}
			else
			{
				echo "<script>alert('Upload a image of png/jpg/jpeg format only')</script>";				
			}
		}

		$select="select * from credentials where uname='$email'";
		$query=mysqli_query($dbhandle,$select);
		if(@mysqli_num_rows($query)==1){
			$row=mysqli_fetch_assoc($query);
			$id=$row['id'];
			$update_info="update info SET yop = '$yop', Privacy = $privacy,m_no='$tel',Address='$addr', PhD_Status=$phd,Work_Status=$pwork,Designation='$desig', work_place_name='$dept',work_since=$doj,work_city='$city',work_addr='$waddr',achi='$achi',image='$img_data', WHERE id=$id;";
			if(mysqli_query($dbhandle,$update_info)){
				$update="update ex_pass set ISS=$exam[ISS],RBI=$exam[RBI],So=$exam[So],ASO=$exam[ASO],Si1=$exam[Si1],Si2=$exam[si2],jso=$exam[jso],ra=$exam[ra],compiler=$exam[compiler],rsmssb=$exam[rsmssb],other_govt=$exam[other_govt],tr=$exam[tr],corp=$exam[corp],other='$other' where id=$id";
				if(mysqli_query($dbhandle,$update)){
					echo "<script>alert('Successfull');</script>";
				}
				else{
					echo "<script>alert('Error.');</script>";

				}
			}
			else{
				echo "<script>alert('error.');</script>";
			}
			echo "<script>window.location.href='../homepage-2.html'</script>";
		}
		else{
			$pass=sha1($email);
			$insert="insert into credentials (uname,pass) values ('$email','$pass')";
            if(!mysqli_query($dbhandle,$insert)){
            	echo mysqli_error($dbhandle);
               	echo "<script>alert('Unable to register..111')</script>";
                echo "<script> window.location.href='register.php'</script>";            
            }
            else{
            	$id_fetch="select id from credentials where uname='$email'";
                $query=mysqli_query($dbhandle,$id_fetch);
                if($query){
                    $row=mysqli_fetch_assoc($query);
                    $id=$row['id'];
                    $insert_info="insert into info values($id,'$name','$yop','$privacy','$tel','$addr','$phd','$pwork','$desig','$dept','$doj','$city','$waddr','$achi','$img_data') ";
                 	if(!mysqli_query($dbhandle,$insert_info)){
                 		echo mysqli_error($dbhandle);
		               	echo "<script>alert('Unable to register..1')</script>";
		                echo "<script> window.location.href='register.php'</script>";            
		            }   
		            else{
		            	$insert_ex="insert into ex_pass values($id,$exam[ISS],$exam[RBI],$exam[So],$exam[ASO],$exam[Si1],$exam[si2],$exam[jso],$exam[ra],$exam[compiler],$exam[rsmssb],$exam[other_govt],$exam[tr],$exam[corp],'$other')";
		            	if(!mysqli_query($dbhandle,$insert_ex)){
		            		echo mysqli_error($dbhandle);
			               	echo "<script>alert('Unable to register..2')</script>";
			                echo "<script> window.location.href='register.php'</script>";            
			            }
			            else{
			            	echo "<script>alert('Successfull');</script>";
							echo "<script>window.location.href='../homepage-2.html'</script>";
			            }
		            }
                }
            }
		}
		$image_ret="select * from info where id=$id";
		$result = mysqli_query($con, $sql) or die('Error ' . mysqli_error($con));
		$row = mysqli_fetch_array($result);


	}
	else{
		echo "No";
	}
		
?>

<html>
<head>
    <title>Retrieve Image from MySQL Database in PHP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container text-center">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>'; ?>
    </div>
</body>
</html>
