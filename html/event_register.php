<?php
    session_start();
    require "php/config.php";
    if(isset($_SESSION['uid']))
    {
        $uid=$_SESSION['uid'];
        $uname = $_SESSION['username'];
    
    if(isset($_POST['event_reg'])){
        $eid=$_POST['eid'];
        $ename=$_POST['ename'];
        $eloc=$_POST['eloc'];
        $etime=$_POST['etime'];
        $edesc=$_POST['edesc'];
        //echo $eid;
        $insert="insert into event_info values('$eid','$uid')";
        if(mysqli_query($dbhandle,$insert)){
            $subject1 = "Event Registration Successful for ".$ename;
            $body="Hey there , \n :".$edesc;
            $headers = "From: alumnidosuor@gmail.com";
        if (mail($uname, $subject1, $body, $headers)) {
            echo "<script>alert('Successfully Registered')</script>";
            echo "<script>window.location.href='event.php'</script>";
        } 
        
            
        }
        else{
            echo "<script>alert('Couldn't register')</script>";
           //echo "Couldn't register";
            }        
    }
    }
    else{
        echo "<script>alert('Please Login First')</script>";
        echo "<script>window.location.href='register.html'</script>";
    }

?>