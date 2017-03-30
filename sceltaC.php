<?php
    require("php/config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Cristian Bregant">
    <meta name="theme-color" content="#9B59B6">
    <link rel="icon" href="../../favicon.ico">

    <title>Home</title>
		<!-- Latest compiled and minified CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/customcss.css" rel="stylesheet">
<link href="dist/css/carousel.css" rel="stylesheet">
    <link href="dist/css/cssIndex.css" rel="stylesheet">


<!-- Latest compiled and minified JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://www.fontify.me/wf/97492c2e00a889f1ac6f61829270d6e5" rel="stylesheet" type="text/css">


          <script type="text/javascript" src="dist/js/tether.min.js"></script>


    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
	</head>
	<body>
  <div id="wrapper">

	     <div id="navbar">
        <?php include_once('navbar.php'); ?>
       </div>

    <div class="container">
          <!-- START THE FEATURETTES -->
<br>
<br>
        <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <div class="desktop" id="img1" onclick="location.href='paginaMostraCampi.php';"><h2>Campi</h2></div>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <div class="desktop" id="img2" onclick="location.href='paginaMostraCase.php';"><h2>Case</h2></div>
        </div>
        <div class="col-lg-4">
          <div class="desktop" id="img3" onclick="location.href='paginaMostraEntrambi.php';"><h2>Case con campo</h2></div>
        </div>
      </div><!-- /.row -->
    </div>
    </div>
  </body>

</html>