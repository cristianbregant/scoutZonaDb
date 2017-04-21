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

    <title>Casa: </title>
		<!-- Latest compiled and minified CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/customcss.css" rel="stylesheet">

<!-- Optional theme -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script>
$(document).ready(function($) {
$("input").attr("required", true);

  $("#conferma").click(function(event){

    event.preventDefault();
      var V1 = $("#newPass").val();
      var V2 = $("#newPassConferma").val();
      if(V1 === V2){
          var dati = $("#password").serialize();
           $.ajax({
                    type: "POST",
                    url: "php/changePassword.php",
                    data: dati,
                     success: function(response){
                        alert("PASSWORD MODIFICATA CON SUCCESSO!");
                        window.location = "index.php";
                    },
                     error: function(){
                        alert('errore cambio password');
                     }
                   });
      }else{
        alert("La nuova password non coincide con la conferma");
      }          
     });
   

 });
</script>
<style>

</style>


	</head>
	<body>
  <div id="wrapper">

 <div id="navbar">
           <?php include_once('navbar.php'); ?>
 </div>

    <div class="container">
    <fieldset>
      <form id="password" name="password">
    <div class="form-group">
      <label>Inserisci la vecchia password</label>
      <input type="password" id="pass" name="pass" required/>
    </div>
    <div class="form-group">
    <label>Inserisci nuova password</label>
    <input type="password" name="newPass" id="newPass" required/>
    </div>
    <div class="form-group">
    <label>Inserisci nuovamente la nuova password</label>
    <input type="password" name="newPassConferma" id="newPassConferma" required/>
    </div>
    <div style="float:right">
    <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['user']; ?>" />
     <button id="conferma">Cerca</button>
     </div>
    </form>

      
    </fieldset>


    







      

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