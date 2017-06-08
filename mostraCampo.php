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
        <meta name="theme-color" content="#0d3c55">

    <link rel="icon" href="../../favicon.ico">

    <title>Ricerca Campi</title>
		<!-- Latest compiled and minified CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/customcss.css" rel="stylesheet">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnycWatbGyK6ldFqErjFtko1yeMclNUOA&amp;"></script>
<!-- Optional theme -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="dist/js/moment-with-locales.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script>
var coord ="";
$(document).ready(function($) {

  $.urlParam = function(name){
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  return results[1] || 0;
  };

  var dataT = $.urlParam('id');
  //console.log("cacca"+dataT);
    $.ajax({
                    type: "POST",
                    url: "php/getScelta.php",
                    dataType: "json",
                    data: "f=1&id="+dataT,
                     success: function(response){
                         var trHTML = '';
                
                        $.each(response, function (i, o) {
                       var dataC = moment(o.Data_ultima_verifica).format("DD/MM/YYYY");
                          $('#campo').text(o.Grandezza_Campo+" mq");
                          $('#reg').text(o.Regione);
                          $('#prov').text(o.Provincia);
                          $('#com').text(o.Comune);
                          $('#telefono').text(o.Cellulare_Proprietario);
                          $('#nome').text(o.Nome_Campo);
                          $('#acqua').text(o.Acqua);
                          $('#fiume').text(o.Fiume_Vicino);
                          $('#bosco').text(o.Bosco_Vicino);
                          $('#ref').text(o.Referente);
                          $('#data').text(dataC);
                          $('#desc').text(o.Descrizione);
                          $('#cartina').text(o.Coordinate);
                                  /* $('#campi').append('<tr class=\"table-row\" data-href=\"http://'+o.Link+'\"><td>' + o.Nome_Campo + '</td><td>' + o.Provincia + '</td><td>' + o.Acqua + '</td><td>' + o.Fiume_vicino + '</td><td>' + o.Bosco_vicino + '</td><td style="display:none;">' + o.Link + '</td><td id="delete" align="center" onclick="deleteRow();">x</td></tr>');*/
                                  coord = ""+o.Coordinate;

                                  google.maps.event.addDomListener(window, 'load', initialize);


                                });
                    },
                     error: function(){
                        alert('errore carico campi');
                     }
                });
});
function initialize() {
  //Metodo per ricavare dalle coordinate nel db la cartina su maps che richiede per forza i valori di longitudine e latitudine separati
  var coordC = {"lat": ""+coord.substr(0,coord.indexOf(',')),"long":""+coord.substr(coord.indexOf(',')+1,coord.length)};
            var myLatlng = new google.maps.LatLng(coordC.lat,coordC.long);
            var mapOptions = {
                center: myLatlng,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.HYBRID,
                scrollwheel: true,
                draggable: true,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true,
                rotateControl: true,
            };
            var marker = new google.maps.Marker({position:myLatlng});
            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
            marker.setMap(map);
           

        }
</script>
<style>
#contactform .btn:hover {
  background: rgba(9,8,77,0.7);
}

#map-canvas {
  width: 100%;
  height: 400px;
  margin-bottom: 15px;
  border: 2px solid #fff;
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
                 <h2>Terreno: <span id="nome"></span></h2>
                 <hr/>
                  <!-- Button trigger modal -->
<div class="col-md-4">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="uploads/fotoCampi/1/20170412_082551.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="uploads/fotoCampi/1/20170412_083003.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="uploads/fotoCampi/1/20170412_083034.jpg" alt="New york" style="width:100%;">
      </div>

      <div class="item">
        <img src="uploads/fotoCampi/1/20170412_083348.jpg" alt="New yorka" style="width:100%;">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="col-md-8">
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
        <p id="campo"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Acqua potabile:</label>  
        <div class="radio-inline">
        <p id="acqua"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Fiume Vicino:</label>  
        <div class="radio-inline">
        <p id="fiume"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Bosco Vicino:</label>  
        <div class="radio-inline">
        <p id="bosco"></p>
      </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Referente:</label>  
        <div class="radio-inline">
        <p id="ref"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Telefono:</label>  
        <div class="radio-inline">
        <p id="telefono"></p>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">Data Ultima Verifica:</label>  
        <div class="radio-inline">
        <p id="data"></p>
        </div>
      </div>

</div>

      <div class ="col-md-12">
      <h2>Descrizione</h2>
      <p id="desc"></p>
      </div>
      <div class ="col-md-12">
      <h2>Mappa</h2>
      <p id="cartina"></p>
      
            
<div id="map-canvas"></div>
    
<!--Google Maps API-->

      </div>

    </div><!-- /.container -->
    </div>
    <div id="footer">
           <?php include_once('footer.php'); ?>
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