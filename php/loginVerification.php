
<?php

$servername = "localhost";
$username = "root";
$password = "";
$user = "zona";

// Create connection
$con = mysqli_connect($servername, $username, $password,$user);

$uname=$_POST['user'];
$pass=$_POST['pass'];
if($uname=='' || $pass=='')
{
        header("Location:login.php?id=Some fields are empty");
}

$qry=mysqli_query($con,"SELECT * FROM user WHERE username='$uname'");
if(!$qry){
die("Query Failed: ". mysqli_error());
}else{
   $row=mysqli_fetch_array($qry);
if($uname==$row['username']){
    if($uname==$row['username'] && $pass==$row['password']){
            header("Location:../index.html");    
    }else{
                header("Location:login.php?id=username already taken or your password is incorrect. Please try again");
        }
    }else{

    }    
  }
  mysqli_close();
  ?>