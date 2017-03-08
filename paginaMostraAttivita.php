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
   ultimeAttivita();
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
    
    $("#form").submit(function(e){

        alert($("#form").serialize());
        $.ajax({
                    type: "POST",
                    url: "php/ricercaAttivita.php",
                    data: $("#form").serialize(),
                    dataType: "json",
                     success: function(response){
                         var trHTML = '';
                $("#attivita tr").html("");
                       /* $.each(response, function (i, o) {
                                   $('#attivita').append('<tr class=\"table-row\" data-href=\"http://'+o.Link+'\"><td>' + o.Nome + '</td><td>' + o.Descrizione + '</td><td>' + o.Autore + '</td><td>' + o.DataInserimento + '</td><td style="display:none;">' + o.Link + '</td><td id="delete" align="center" onclick="deleteRow();">ooooo</td></tr>');
                                });*/
                    },
                     error: function(){
                        alert('errore carico attivita');
                     }
                });



     });
})
function ultimeAttivita(){
    $.ajax({
                    type: "POST",
                    url: "php/getUltimeAttivita.php",
                    dataType: "json",
                     success: function(response){
                         var trHTML = '';
                
                        $.each(response, function (i, o) {
                                   $('#attivita').append('<tr class=\"table-row\" data-href=\"http://'+o.Link+'\"><td>' + o.Nome + '</td><td>' + o.Descrizione + '</td><td>' + o.Autore + '</td><td>' + o.DataInserimento + '</td><td style="display:none;">' + o.Link + '</td><td id="delete" align="center" onclick="deleteRow();">x</td></tr>');
                                });
                    },
                     error: function(){
                        alert('errore carico attivita');
                     }
                });
}
 
</script>
	</head>
	<body>
  <div id="wrapper">

	     <div id="navbar">
        <?php include_once('navbar.php'); ?>
       </div>

    <div class="container">
    <div style="float:left">
        <button type="button" class="btn btn-custo"m data-toggle="modal" data-target="#demo-modal-3">
                      Inserisci
        </button>
    </div>
   <div style="float:right">
    <form id="form">
        <input type="text" name="ricerca" id="ricerca">
        <input type="submit" value="Cerca">
    </form>
   </div>
<br><br><br>
   <div class="table-responsive">
            <table class="table table-striped" id="attivita" name="attivita">
                <tr>
                  <th>Nome</th>
                  <th>Descrizione</th>
                  <th>Autore</th>
                  <th>Data Inserimento</th>
                </tr>
             
            </table>
          </div>
      </div>


       </div>
  </body>

</html>