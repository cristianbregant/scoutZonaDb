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
<!-- Latest compiled and minified JavaScript -->
<script>
$(document).ready(function($) {

});
function comuni() {                
                $.ajax({
                    type: "POST",
                    url: "php/comuni.php",
          async: true,
                    data: $("#inserimento").serialize(),
                     success: function(response){
              eval(response)
            },
           error: function(){
              alert('errore carico provincie/comuni');
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
    <h2 class="sub-header">Inserisci Nuovo campo</h2>
    <br>
      <form class="form-horizontal" method="POST" id="inserimento"onsubmit="return confirm('Sei sicuro di volerlo confermare?');">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Nome Campo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Regione</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="">
    </div>
  </div>
  <div class="form-group">
          <label for="prov" class="control-label col-xs-2">Provincia</label>
          <div class="col-xs-3">
              <select class="form-control target" name="provincia" required>
              <option>Mustard</option>
              <option>Ketchup</option>
              <option>Relish</option>
              </select>
          </div>
          <label for="comune" class="control-label col-xs-2">Comune</label>
          <div class="col-xs-4">
            <select class="form-control" name="comune" required>
              <option>Mustard</option>
              <option>Ketchup</option>
              <option>Relish</option>
              </select>
          </div>
        </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Link google maps</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Grandezza Campo</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Acqua potabile</label>
    <div class="col-sm-2">
       <select class="form-control" id="potabile">
        <option>SI</option>
        <option>NO</option>
       </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Fiume vicino</label>
    <div class="col-sm-2">
     <select class="form-control" id="fiume">
            <option>SI</option>
            <option>NO</option>
      </select>    
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Bosco Vicino</label>
    <div class="col-sm-2">
      <select class="form-control" id="bosco">
        <option>SI</option>
        <option>NO</option>
       </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Referente</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Telefono Referente</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="descrizione">Descrizione</label>
    <div class="col-sm-5">
     <textarea class="form-control" rows="5" id="descrizione"></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Conferma</button>
    </div>
  </div>
</form>
    

    </div><!-- /.container -->
    </div>
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