<?php
    require "config.php";
    if(isset($_POST["regi"])){
        $suggestion=$_POST["suggestions"];
        $email=$_POST["email"];
        $name=$_POST["fname"];
        $yop=$_POST["pyear"];
        if($_POST["optradio"]=="Yes"){
            $privacy="YES";
        }
        else{
            $privacy="NO";
        }
        if($_POST["enrol"]=="M.Sc. Student"){
            $enrol="M.Sc. Student";
        }
        else{
            $enrol="PhD Student (M.Sc from other University and PhD enrollment from Deptt)";
        }
        $tel=$_POST["mobno"];
        $addr=$_POST["uadd"];
        if($_POST["phd"]=="Completed"){
            $phd="COMPLETED";
        }
        else if($_POST["phd"]=="Pursuing"){
            $phd="PURSING";
        }
        else{
            $phd="NO";
        }
        $exam=array("ISS"=>"NO","RBI"=>"NO","SO"=>"NO","ASO"=>"NO","SIG1"=>"NO","SIG2"=>"NO","JSO"=>"NO","RA"=>"NO","COMPILER"=>"NO","RSMSMB"=>"NO","OTHER_GOVT"=>"NO","TEACHER"=>"NO","CORPORATE"=>"NO");
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
        foreach($_POST['check'] as $selected) {
            $exam[$selected]="YES";         
        }
        $img_name = $_FILES['img']['name'];
        $suggestion = $_POST["suggestions"];
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

        $select="select * from credentials where username='$email'";
        $query=mysqli_query($dbhandle,$select);
        if(@mysqli_num_rows($query)==1){
            echo mysqli_error($dbhandle);
            echo "<script>alert('User Already Registered')</script>";
            echo "<script> window.location.href='../register.html'</script>";            
        }
        else{
            $pass_send=substr(sha1($email), 0,6);
            $pass=sha1($pass_send);
            $insert="insert into credentials (username,password) values ('$email','$pass')";
            if(!mysqli_query($dbhandle,$insert)){
                echo mysqli_error($dbhandle);
                echo "<script>alert('Unable to register..111')</script>";
                echo "<script> window.location.href='../register.html'</script>";            
            }
            else{
                $id_fetch="select id from credentials where username='$email'";
                $query=mysqli_query($dbhandle,$id_fetch);
                if($query){
                    $row=mysqli_fetch_assoc($query);
                    $id=$row['id'];
                    $insert_info="insert into info values($id,'$name','$enrol','$yop','$privacy','$tel','$addr','$phd','$pwork','$desig','$dept','$doj','$city','$waddr','$achi','$suggestion','$img_data') ";
                    if(!mysqli_query($dbhandle,$insert_info)){
                        echo mysqli_error($dbhandle);
                        echo "<script>alert('Unable to register..1')</script>";
                        echo "<script> window.location.href='../register.html'</script>";            
                    }   
                    else{
                        $insert_ex="insert into ex_pass values($id,'$exam[ISS]','$exam[RBI]','$exam[SO]','$exam[ASO]','$exam[SIG1]','$exam[SIG2]','$exam[JSO]','$exam[RA]','$exam[COMPILER]','$exam[RSMSMB]','$exam[OTHER_GOVT]','$exam[TEACHER]','$exam[CORPORATE]','$other')";
                        if(!mysqli_query($dbhandle,$insert_ex)){
                            echo mysqli_error($dbhandle);
                            echo "<script>alert('Unable to register..2')</script>";
                            echo "<script> window.location.href='../register.html'</script>";            
                        }
                        else{                      
                            $subject = "Your Account credentials for UOR Alumni";
                            $body = "Hi, Thanks for registering for the University of  Rajastan Alumni Portal. Your login credentials are as follows:
                                Username : ".$email." 
                                Password : ".$pass_send."
                            ";
                            $headers = "From: kedarnathchimmad555@gmail.com";

                            if (mail($email, $subject, $body, $headers)) {
                                echo "<script>alert('Successfully registered... Kindly check the mail for the login details.');</script>";
                                echo "<script>window.location.href='../register.html'</script>";
                            } 
                            else {
                                echo mysqli_error($dbhandle);
                                echo "<script>alert('Unable to register..2')</script>";
                                echo "<script> window.location.href='../register.html'</script>";
                                echo "Email sending failed...";
                            }                            
                        }
                    }
               }
            }
        }
        
        
    }
        
?>
