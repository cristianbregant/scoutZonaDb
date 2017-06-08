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
<!-- Optional theme -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dist/css/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
 
<script type="text/javascript" src="dist/js/datatables.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script>
//caricaUltimiCampi();
$(document).ready(function($) {
   var table = $('#case').DataTable( {
        responsive:true,
        bLengthChange: false,
        language: {
            "lengthMenu": "Mostra _MENU_ elementi",
            "zeroRecords": "Nessuna casa trovata",
            "info": "Mostra pagina _PAGE_ di _PAGES_",
            "infoEmpty": "Nessuna casa presente",
            
            "infoFiltered": "(filtra al massimo _MAX_ case')",
            "search": "Cerca:",
            "paginate": {
                "first":      "Prima",
                "last":       "Ultima",
                "next":       "Prossima",
                "previous":   "Precedente"
            },
        },
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }],
        columns: [
        {data: 'id'},
        { data: 'Nome_Casa' },
        { data: 'Provincia' },
        { data: 'Capienza_Letti' },
        { data: 'Stanze' },
        { data: 'Servizi' },
        { data: 'url',"render": function ( data, type, row, meta ) {
                return "<a href='mostraCasa.php?id=" + row['id']+ "'>" + "Apri" + '</a>';}}
        ]
    } );
  $.ajax({
    type: "POST",
    url: "php/getC.php?f=2",
    dataType: "json",
     success: function(response){
        $.each(response, function (i,o) {    
          $.each(o, function (index, data) {
            console.log("index",data);
              table.row.add({
                "id": data.id,
                "Nome_Casa": data.Nome_Casa,
                "Provincia":data.Provincia,
                "Capienza_Letti":data.Capienza_Letti,
                "Stanze":data.Stanze,
                "Servizi":data.Servizi
              }).draw();
          });          
        });
    },
     error: function(){
        alert('errore carico case');
     }
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
                  <h2 class="sub-header">Case </h2>
                  <!-- Button trigger modal -->
					<div style="float:right">
          <input type="button" onclick="location.href='ricercaAvanzataCase.php';" value="Ricerca Avanzata" />
          </div>

          <br><br><br>


          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="case" name="case" cellspacing="0" width="100%">
         <thead>
                <tr>
                <th>id</th>
                  <th>Nome Casa</th>
                  <th>Provincia</th>
                  <th>Capienza</th>
                  <th>Stanze</th>
                  <th>Servizi</th>
                  <th>URL</th>
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