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

<!-- Latest compiled and minified JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<style>
.hover12 figure img {
  opacity: 1;
  -webkit-transition: .3s ease-in-out;
  transition: .3s ease-in-out;
}
.hover12 figure:hover img {
  opacity: .5;
}
</style>
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
        <div class="col-lg-4 hover12">
         <img class="img-circle" src="dist/img/campo_ex.png" alt="Generic placeholder image" width="220" height="220">
          <h2>Campi/Case</h2>
          <p>Sei alla ricerca di un posto dove fare il campo estivo o un campetto invernale? Questa e la sezione adatta!</p>
          <p><a class="btn btn-default" href="paginaMostraCampi.php" role="button">Cerca &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="dist/img/attivit_ex.png" alt="Generic placeholder image" width="220" height="220">
          <h2>Attività</h2>
          <p>Devi parlare di un tema ma non sai come affrontarlo? Cerca tra le attivita qui dentro!</p>
          <p><a class="btn btn-default" href="paginaMostraAttivita.php" role="button">Cerca &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="dist/img/materiali_ex.png" alt="Generic placeholder image" width="220" height="220">
          <h2>Materiali di zona</h2>
          <p>Hai bisogno di avere in prestito del materiale dalla zona? Qui sei nel posto giusto!</p>
          <p><a class="btn btn-default" href="#" role="button">Controlla &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </div>
    </div>
  </body>

</html>