<?php
  if(isset($_POST["upld"]))
  {
    //echo "<script>alert('php page')</script>";
    //$dbhandle=mysqli_connect("localhost","root","","project") or die("Unable to connect to database");
    require "php/config.php";

  
    $path = "uploads/";
    
    $path = $path . basename( $_FILES['upload']['name']);
    $size = $_FILES['upload']['size'];
    $type = $_FILES['upload']['type'];
    $bname = $_POST['bname'];
    //echo "<script>alert('$bname')</script>";
    $yop = $_POST['yop'];
    //echo "<script>alert('$yop')</script>";
    $author = $_POST['author'];
    //echo "<script>alert('$author')</script>";
    if(move_uploaded_file($_FILES['upload']['tmp_name'], $path)) {
      //echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      //" has been uploaded";
      //insert into library(File_Name,File_Path,File_Type,File_Size,Year_Of_Publication,Author_name) values('intro','as','ash',222,2019,'Gaurav');
      $query="insert into library(File_Name,File_Path,File_Type,File_Size,Year_Of_Publication,Author_name) values('$bname','$path','$type','$size','$yop','$author')";

      $flag=mysqli_query($dbhandle,$query) or die("Unable to fetch".mysqli_error($dbhandle));
      if(!$flag)
      { 
        //echo "<body bgcolor=tan> <h1 align=center>";
        echo "<script>alert('cannot upload in dataabse')</script>";
        echo "<script>window.location.href='../html/ALibrary.php'</script>";
      }
      else
      {
        //echo "<body bgcolor=tan> <h1 align=center>";
        echo "<script>alert('File Uploaded successfully')</script>";
        echo "<script>window.location.href='../html/ALibrary.php'</script>";
      }
    
    } else{
        //echo "<body bgcolor=tan> <h1 align=center>";
        echo "<script>alert('There was an error uploading the file, please try again!')</script>";
        echo "<script>window.location.href='../html/ALibrary.php'</script>";
    }
  }
?>