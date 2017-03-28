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
    <link rel="icon" href="../../favicon.ico">
    <meta name="theme-color" content="#9B59B6">


    <title>Attivita'</title>
		<!-- Latest compiled and minified CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/customcss.css" rel="stylesheet">
<link href="dist/css/carousel.css" rel="stylesheet">

<!-- Latest compiled and minified JavaScript -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dist/css/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
 
<script type="text/javascript" src="dist/js/datatables.min.js"></script>
<script type="text/javascript" src="dist/js/moment-with-locales.js"></script>
<script>
$(document).ready(function($) {
var table = $('#attivita').DataTable( {
        responsive:true,
        pageLength: 15,
        bLengthChange: false,

        language: {
            "lengthMenu": "Mostra _MENU_ elementi",
            "zeroRecords": "Nessun attivita' trovata",
            "info": "Mostra pagina _PAGE_ di _PAGES_",
            "infoEmpty": "Nessun attivita' presente",
            "infoFiltered": "(filtra al massimo _MAX_ attivita')",
            "search": "Cerca:",
            "paginate": {
                "first":      "Prima",
                "last":       "Ultima",
                "next":       "Prossima",
                "previous":   "Precedente"
            },
        },
        ajax: {
          url: "php/getUltimeAttivita.php", 
          dataSrc:""
        },
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }],
        columns: [
        {data: 'id'},
        { data: 'Nome' },
        { data: 'Descrizione' },
        { data: 'Branca' },
        { data: 'Autore' },
        { data: 'DataInserimento' ,
            'render': function (data) {
                     return (moment(data).format("DD/MM/YYYY"));
                   }}
        ]
    } );




   //ultimeAttivita();
  $("#attivita tbody").on('click', 'tr', function () {
        var data = table.row( this ).data();
        var id = data['id'];
        window.location = "mostraAttivita.php?id="+id;
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
});
/*function ultimeAttivita(){
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
                });*/

 
</script>
	</head>
	<body>
  <div id="wrapper">

	     <div id="navbar">
        <?php include_once('navbar.php'); ?>
       </div>

    <div class="container">
    <div style="float:left">
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalNorm">
    Inserisci
</button>

<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Aggiungi attivita'
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form action="php/insertAttivitaFile.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="nomeAtt">Nome</label>
                      <input type="text" name="nomeAtt" class="form-control"
                      id="nomeAtt" placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="descrizione">Descrizione</label>
                     <textarea class="form-control" name="descrizione" rows="5" id="descrizione"></textarea>
                  </div>
                 <input type="hidden" class="form-control" id="autore" name="autore" value="<?php echo ((isset($_SESSION["user"]))?$_SESSION["user"]:"nonce"); ?>"/>
                  <div class="form-group">
                    <label for="descrizione">Branca</label>
                     <select class="form-control" id="branca" name="branca">
                      <option>L/C</option>
                      <option>E/G</option>
                      <option>R/S</option>
                     </select>
                  </div>
                 <input type="hidden" name="action" value="upload" />
                  <label>Carica il tuo file:</label>
                  <input type="file" name="fileToUpload" id="fileToUpload" />
                        <input type="submit" class="btn btn-default" value="Conferma"/>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Chiudi
                </button>
                
            </div>
        </div>
    </div>
</div>
    
   </div>
<br><br><br>
   <div class="table-responsive">
            <table id="attivita" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th>id</th>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Branca</th>
                <th>Autore</th>
                <th>Data Inserimento</th>
            </tr>
        </thead>
    </table>
          </div>
      </div>


       </div>
  </body>

</html>