<?php
include('php/session.php');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
        <meta name="theme-color" content="#0d3c55">


    <title>Modifica Password</title>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/customcss.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    
        <script src="dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dist/css/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
 
<script type="text/javascript" src="dist/js/datatables.min.js"></script>
<script>
$(document).ready(function($) {
 
});
function checkPassword(){
  var newPass = document.getElementById("newPass").value;
  var repeatPass = document.getElementById("repeatPass").value;
  var oldPass = document.getElementById("oldPass").value;

  if(newPass==repeatPass){
    console.log("Password cambiata");
  }else{
    console.log("Password diverse");
  }

}
</script>
	</head>
	<body>
  <div id="wrapper">

	     <div id="navbar">
        <?php include_once('navbar.php'); ?>
       </div>

    <div class="container">
    <div align="center"><h2 class="sub-header">Modifica Password </h2></div>
    <form id="edit" onsubmit="checkPassword()">
      Inserire vecchia password<br>
      <input type="password" id="oldPass"/><br>

      Inserire nuova password<br>
      <input type="text" id="newPass"/><br>

      Ripetere la nuova password<br>
      <input type="text" id="repeatPass"/><br>

      <input type="submit" value="Conferma"/>
    </form>

    </div>
  </div>
  </body>

</html>