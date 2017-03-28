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
        <meta name="theme-color" content="#9B59B6">

    <link rel="icon" href="../../favicon.ico">

    <title>Ricerca Campi</title>
		<!-- Latest compiled and minified CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/customcss.css" rel="stylesheet">
<!-- Optional theme -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="dist/js/moment-with-locales.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script>
$(document).ready(function($) {
  $.urlParam = function(name){
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  return results[1] || 0;
  };

  var dataT = $.urlParam('id');
  //console.log("cacca"+dataT);
    $.ajax({
                    type: "GET",
                    url: "php/getAttScelta.php",
                    dataType: "json",
                    data: "&id="+dataT,
                     success: function(response){
                         var trHTML = '';
                
                        $.each(response, function (i, o) {
                       var dataC = moment(o.DataInserimento).format("DD/MM/YYYY");
                          $('#nome').text(o.Nome);
                          $('#reg').text(o.Descrizione);
                          $('#prov').text(o.Branca);
                          $('#com').text(o.Autore);
                          $('#data').text(dataC);
                          $('#link').text(o.Nome_file);
                          $('#link').attr("href","http://"+o.Link_file);
                          

                        });
                    },
                     error: function(){
                        alert('errore carico campi');
                     }
                });
});
</script>
<style>
#contactform .btn:hover {
  background: rgba(9,8,77,0.7);
}

img{
  width:100%;
  height:300px;
}
</style>


	</head>
	<body>
  <div id="wrapper">

 <div id="navbar">
           <?php include_once('navbar.php'); ?>
 </div>

    <div class="container">

      <div class="starter-template">
                 <h2>Terreno: </h2><h2 class="sub-header" id="nome"></h2>
                  <!-- Button trigger modal -->
<div class="col-md-12">
     <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Regione:</label>  
        <div class="radio-inline">
        <p id="reg"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Provincia:</label>  
        <div class="radio-inline">
        <p id="prov"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Comune:</label>  
        <div class="radio-inline">
        <p id="com"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Grandezza Campo:</label>  
        <div class="radio-inline">
        <a href="" id="link"></a>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Data Inserimento:</label>  
        <div class="radio-inline">
        <p id="data"></p>
        </div>
      </div>

</div>


      </div>


      </div>

    </div><!-- /.container -->
   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>window.jQuery || document.write('<script src="dist/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <script src="dist/js/ie10-viewport-bug-workaround.js"></script>
    <script src="dist/js/multi-step-modal.js"></script>
<script>
sendEvent = function(sel, step) {
    $(sel).trigger('next.m.' + step);
}
</script>
 	</body>
</html>