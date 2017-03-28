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
		var mat = $_GET('materiale');
		$('#calendar').fullCalendar({
			editable: false,
			eventSources:[
			{
				url: 'php/getCalendar.php?materiale='+mat,
				color: 'yellow',
				textColor: 'black'
			}
			]
			
		});
		
	});
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
<div id='calendar'></div>
    </div>
    </div>
	

</body>
</html>


