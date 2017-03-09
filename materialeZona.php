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
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
        <meta name="theme-color" content="#9B59B6">


    <title>Materiale</title>
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
      
    $.ajax({
                    type: "GET",
                    url: "php/materialiRetrieve.php",
                    dataType: "json",
                    data: "{}",
                     success: function(response){
                         var trHTML = '';
                
                        $.each(response, function (i, o) {
                                   $('#materiali').append('<tr class=\"table-row\"><td>' + o.Nome + '</td><td>' + o.Descrizione + '</td><td>' + o.Qta + '</td></tr>');
                                });
                    },
                     error: function(){
                        alert('errore carico eventi');
                     }
                }); 
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
   <div class="table-responsive">
            <table class="table table-striped table-hover" id = "materiali" name="materiali">
                <tr>
                  <th>Nome</th>
                  <th>Descrizione</th>
                  <th>Q.tà</th>
                </tr>
            </table>
          </div>
  </body>

</html>