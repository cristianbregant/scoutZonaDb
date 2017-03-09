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
$(document).ready(function() {
      
    $.ajax({
                    type: "GET",
                    url: "php/eventiLCtab.php",
                    dataType: "json",
                    data: "{}",
                     success: function(response){
                         var trHTML = '';
                
                        $.each(response, function (i, o) {
                                   $('#eventi').append('<tr class=\"table-row\" data-href=\"http://'+o.Link+'\"><td>' + o.Nome + '</td><td>' + o.Descrizione + '</td><td>' + o.DataInserimento + '</td><td style="display:none;">' + o.Link + '</td><td id="delete" align="center" onclick="deleteRow();">ooooo</td></tr>');
                                });
                    },
                     error: function(){
                        alert('errore carico eventi');
                     }
                }); 
    //Al click del documento lo apre direttamente nel browser
    $("#eventi").on('click', 'tr' , function (event) {
        var array = Array();
        $(this).children('td').each(function(i,v){
          array[i]=$(this).text();
        });
        var url = array[3];
        window.location = "http://"+url;
  });
function deleteRow(){

}

});
              
                
            
</script>
	</head>
	<body>
  <div id="wrapper">

	     <div id="navbar">
        <?php include_once('navbar.php'); ?>
       </div>

    <div class="container">
<form method="post" action="php/testUpload.php" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload" />
            <label>Carica il tuo file:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" />
            <label>Descrizione</label>
            <input type="text" name="description" id="description" />
            <input type="hidden" name="branca" id="branca" value="LC"/>
            <br />
            <input type="submit" value="Carica online" />
        </form>

     <div class="table-responsive">
            <table class="table table-striped table-hover" id = "eventi" name="eventi">
                <tr>
                  <th>Nome</th>
                  <th>Descrizione</th>
                  <th>Data Inserimento</th>
                </tr>
            </table>
          </div>
       </div>
  </body>

</html>