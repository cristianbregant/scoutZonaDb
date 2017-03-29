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

    <title>Ricerca Avanzata</title>
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
  var table = $("#campi").DataTable({
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
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }],
        columns: [
        {data: 'id'},
        { data: 'Nome_Campo' },
        { data: 'Provincia' },
        { data: 'Acqua' },
        { data: 'Fiume_vicino' },
        { data: 'Bosco_vicino' }
        ]
    } );
//$("#demo-modal-3").modal('show');

     $("#campi tbody").on('click', 'tr', function () {
        var data = table.row( this ).data();
        var id = data['id'];
        window.location = "mostraCampo.php?id="+id;
  });
});
/*$('#cerca').click(function(){
      /* var dati = $("#ricerca").serialize();
        $.ajax({
                    type: "POST",
                    url: "php/getCampiAvanzato.php",
                    dataType: "json",
                    data: dati,
                     success: function(response){
                        $.each(response, function (i, o) {                         
                           //t.row.add(response).draw(false);
                        });
                    },
                     error: function(){
                        alert('errore carico campi');
                     }
                   });
                  
                */
   /* $("#demo-modal-3").hide();
    });*/
    // get all the inputs into an array.
    



</script>

	</head>
	<body>
  <div id="wrapper">

 <div id="navbar">
           <?php include_once('navbar.php'); ?>
 </div>

    <div class="container">

      <div class="starter-template">
                  <h2 class="sub-header">Ricerca avanzata</h2>
                  <!-- Button trigger modal -->
					<div style="float:left">
          <input type="button" onclick="location.href='paginaMostraCampi.php';" value="Indietro" />
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


  <form class="form-horizontal" id="ricerca" name="ricerca">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nome</label>  
  <div class="radio-inline">
  <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md">
  </div>
</div>
<div class="form-group">
  <label for="acqua">Acqua potabile necessaria:</label>
  <select class="form-control" id="acqua" name="acqua">
    <option value="SI">SI</option>
    <option value="NO">NO</option>
    <option value="NF">Non indispensabile</option>
  </select>
</div>
<div class="form-group">
  <label for="fiume">Fiume vicino necessario:</label>
  <select class="form-control" id="fiume" name="fiume">
    <option value="SI">SI</option>
    <option value="NO">NO</option>
    <option value="NF">Non indispensabile</option>
  </select>
</div>
<div class="form-group">
  <label for="bosco">Bosco vicino necessario:</label>
  <select class="form-control" id="bosco" name="bosco">
    <option value="SI">SI</option>
    <option value="NO">NO</option>
    <option value="NF">Non indispensabile</option>
  </select>
</div>

</fieldset>

    <button id="cerca" >Cerca</button>
</form>

               
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
            <table class="table table-striped table-bordered" id="campi" name="campi" cellspacing="0" width="100%">
              <thead>
                <tr>
                <th>id</th>
                  <th>Nome Campo</th>
                  <th>Provincia</th>
                  <th>Acqua Potabile</th>
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