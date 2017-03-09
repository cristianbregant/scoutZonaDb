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
    <link href="dist/css/mdb.min.css" rel="stylesheet">


<!-- Latest compiled and minified JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="dist/js/mdb.min.js"></script>
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
      <a href="paginaMostraCampi.php">
        <div class="col-lg-4">
          <div class="view overlay hm-purple-light">
           <img class="img-responsive center-block" src="dist/img/campo_ex.png" alt="Generic placeholder image" >
           <div class="mask flex-center">
              <h2 class="white-text">Campi/Case</h2><br><br>
            <p class="white-text">Sei alla ricerca di un posto dove fare il campo estivo o un campetto invernale? Questa e la sezione adatta!</p>
           </div>
          </div>
        </div><!-- /.col-lg-4 -->
        </a>
         <a href="paginaMostraAttivita.php">
        <div class="col-lg-4">
          <div class="view overlay hm-purple-light">
          <img class="img-responsive center-block" src="dist/img/attivit_ex.png" alt="Generic placeholder image" >
          <div class="mask flex-center">
              <h2 class="white-text">Attività</h2><br>
          <p class="white-text">Devi parlare di un tema ma non sai come affrontarlo? Cerca tra le attivita qui dentro!</p>
        </div><!-- /.col-lg-4 -->
        </div>
        </div>
      </a>
 <a href="materialeZona.php">
        <div class="col-lg-4">
           <div class="view overlay hm-purple-light">
          <img class="img-responsive center-block" src="dist/img/materiali_ex.png" alt="Generic placeholder image">
          <div class="mask flex-center">
              <h2 class="white-text">Materiali di zona</h2><br><br>
           <p class="white-text">Hai bisogno di avere in prestito del materiale dalla zona? Qui sei nel posto giusto!</p>
          </div>
          </div>
        </div><!-- /.col-lg-4 -->
        </a>
      </div><!-- /.row -->
    </div>
    </div>
  </body>

</html>