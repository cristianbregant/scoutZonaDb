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


    <title>Eventi</title>
		<!-- Latest compiled and minified CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/customcss.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    
        <script src="dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dist/css/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
 
<script type="text/javascript" src="dist/js/datatables.min.js"></script>

<!-- Latest compiled and minified JavaScript -->


<script>
$(document).ready(function() {
   var table = $('#eventi').DataTable( {
        responsive:true,
        bLengthChange: false,
        language: {
            "lengthMenu": "Mostra _MENU_ elementi",
            "zeroRecords": "Nessun campo trovato",
            "info": "Mostra pagina _PAGE_ di _PAGES_",
            "infoEmpty": "Nessun campo presente",
            
            "infoFiltered": "(filtra al massimo _MAX_ campi')",
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
                "targets": [ 3 ],
                "visible": false,
                "searchable": false
            }],
        columns: [
        { data: 'Nome' },
        { data: 'Descrizione' },
        { data: 'DataInserimento' },
        { data: 'Link' }
        ]
    } );

 $.ajax({
                    url: "php/eventiTab.php",
                    data:"&branca=EG",
                    dataType: "json",
                     success: function(response){
                        $.each(response, function (i,o) {               
                           table.row.add({
                            "Nome": o.Nome,
                            "Descrizione":o.Descrizione,
                            "DataInserimento":o.DataInserimento,
                            "Link":o.Link,

                           }).draw();
                        });
                    },
                     error: function(){
                        alert('errore carico eventi');
                     }
 });   

    //Al click del documento lo apre direttamente nel browser
    $("#eventi tbody").on('click','tr',function(){
      var data = table.row(this).data();
      var url = data['Link'];
      window.location ="http://"+url;
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

    <div style="float:left">
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalNorm">
    Aggiungi materiale evento
</button>
<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <form action="php/uploadFileEventi.php" method="POST" enctype="multipart/form-data">

            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Aggiungi materiale
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                                  <div class="form-group">
                    <label for="nomeAtt">Nome</label>
                      <input type="text" name="nomeEvento" class="form-control"
                      id="nomeAtt" placeholder=""/>
                  </div>
                  <div class="form-group">
                    <label for="descrizione">Descrizione</label>
                     <textarea class="form-control" name="descrizione" rows="5" id="descrizione"></textarea>
                  </div>
                 <input type="hidden" class="form-control" id="autore" name="autore" value="<?php echo ((isset($_SESSION["user"]))?$_SESSION["user"]:"nonce"); ?>"/>
                 <input type="hidden" name="action" value="upload" />
                 <input type="hidden" name="branca" id="branca" value="EG"/>
                  <label>Carica il tuo file:</label>
                  <input type="file" name="fileToUpload" id="fileToUpload" />
                        
                
                
                
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
</div>
<br><br><br>

     <div class="table-responsive">
            <table class="table table-striped table-hover" id = "eventi" name="eventi" cellspacing="0" width="100%">
             <thead>
                <tr>
                  <th>Nome</th>
                  <th>Descrizione</th>
                  <th>Data Inserimento</th>
                  <th>Link</th>
                </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
          </div>
       </div>
  </body>

</html>