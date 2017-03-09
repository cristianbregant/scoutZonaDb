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
    $("#campi").on('click', 'tr' , function (event) {
        var array = Array();
        $(this).children('td').each(function(i,v){
          array[i]=$(this).text();
        });
        var url = array[3];
        window.location = "http://"+url;
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

      <div class="starter-template">
                  <h2 class="sub-header">Ultimi campi inseriti</h2>
                  <!-- Button trigger modal -->
					<div style="float:right">
          <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#demo-modal-3">
					  Cerca
					</button>
          </div>

<br><br><br>
<form class="modal multi-step" id="demo-modal-3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title step-1" data-step="1">Cosa cerchi?</h4>
                <h4 class="modal-title step-2" data-step="2">Campo</h4>
                <h4 class="modal-title step-3" data-step="3">Casa</h4>
                <h4 class="modal-title step-4" data-step="4">Entrambi</h4>
            </div>
            <div class="modal-body step-1" data-step="1">
		        <form action="">
				  <img class="img-circle" src="dist/img/campo_corr_ex.png" alt="Generic placeholder image" width="220" height="220" onclick="sendEvent('#demo-modal-3', 2)"><br>
				  <img class="img-circle" src="dist/img/casa_ex.png" alt="Generic placeholder image" width="220" height="220" onclick="sendEvent('#demo-modal-3', 3)"><br>
				  <img class="img-circle" src="dist/img/entrambi_ex.png" alt="Generic placeholder image" width="220" height="220" onclick="sendEvent('#demo-modal-3', 4)"><br>
				</form>
            </div>
  <div class="modal-body step-2" data-step="2">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerca</button>
            </div>
            <div class="modal-body step-3" data-step="3">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerca</button>
            </div>
            <div class="modal-body step-4" data-step="4">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerca</button>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary step step-2" data-step="2" onclick="sendEvent('#demo-modal-3', 1)">Indietro</button>
            <button type="button" class="btn btn-primary step step-3" data-step="3" onclick="sendEvent('#demo-modal-3', 1)">Indietro</button>
            <button type="button" class="btn btn-primary step step-4" data-step="4" onclick="sendEvent('#demo-modal-3', 1)">Indietro</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</form>

          <div class="table-responsive">
            <table class="table table-striped" id="campi" name="campi">
              <thead>
                <tr>
                  <th>Luogo</th>
                  <th>Tipo</th>
                  <th>Acqua</th>
                  <th>Fiume</th>
                  <th>Bosco</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
      </div>

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