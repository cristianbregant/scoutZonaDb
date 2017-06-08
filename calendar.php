<?php
    require("php/config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: login.php");
        die("Redirecting to login.php"); 
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='dist/calendar/fullcalendar.min.css' rel='stylesheet' />
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href='dist/calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='dist/calendar/moment.min.js'></script>
<script src='dist/calendar/jquery.min.js'></script>
<script src='dist/calendar/fullcalendar.min.js'></script>
<link href="dist/css/customcss.css" rel="stylesheet">
<link href="dist/css/carousel.css" rel="stylesheet">
<script src='dist/locale/it.js'></script>
    <script src="dist/js/bootstrap.min.js"></script>
<script>

	$(document).ready(function() {
		var mat = $_GET('id');
		$('#calendar').fullCalendar({
			editable: false,
			eventSources:[
			{
				url: 'php/getCalendar.php?materiale='+mat,
				color: 'orange',
				textColor: 'black'
			}
			]
			
		});
		
	});
  /*

    Funzione per prendere l'id del materiale dall'url
    Non Toccare, POTREBBE ESPLODERE!

  */
function $_GET(param) {
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) { // callback
			vars[key] = value !== undefined ? value : '';
		}
	);

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}

</script>
<style>

	body {
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
		margin-bottom: 10px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
</head>
<body>
 <div id="wrapper">

	     <div id="navbar">
        <?php include_once('navbar.php'); ?>
       </div>

    <div class="container">
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <form action="php/insertPrenotazione.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Aggiungi Prenotazione
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                
                  <div class="form-group">
                    <label for="nomeAtt">Referente</label>
                      <input type="text" name="referente" class="form-control"
                      id="referente" placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="referente">Cellulare Referente</label>
                     <input type="tel" name="numReferente" class="form-control" id="numReferente" placeholder=""/>
                  </div>
                 <input type="hidden" class="form-control" id="gruppo" name="gruppo" value="<?php echo ((isset($_SESSION["gruppo"]))?$_SESSION["gruppo"]:"nonce"); ?>"/>    
                 <input type="hidden" class="form-control" id="id" name="id" value=""/>    
                  <div class="form-group">
                    <label for="dataI">Data Inizio</label>
                    <input type="date" name="dataI" id="dataI" class="form-control" placeholder=""/>
                  </div>       
                   <div class="form-group">
                    <label for="dataF">Data Fine</label>
                    <input type="date" name="dataF" id="dataF" class="form-control" placeholder=""/>
                  </div> 
                  <div class="form-group">
                    <label for="dataF">Quantita'</label>
                    <input type="date" name="dataF" id="dataF" class="form-control" placeholder=""/>
                  </div> 
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            <div style="float:right">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Chiudi
                </button>
                <input type="submit" class="btn btn-default" value="Conferma"/>
              </div>
            </div>
            </form>
        </div>
    </div>
</div>


    <div style="float:right"> 
     <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalNorm">
		    Prenota
		</button>
		</div>
    <br>
    <br>
    <br>
    <div id='calendar'></div>
    </div>
    </div>
    	

</body>
</html>


