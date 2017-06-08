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
        <meta name="theme-color" content="#0d3c55">


    <title>Materiale</title>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<link href="dist/css/customcss.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    
        <script src="dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dist/css/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"/>
 
<script type="text/javascript" src="dist/js/datatables.min.js"></script>
<script>
$(document).ready(function($) {
      
   var table = $('#materiali').DataTable( {
        responsive:true,
        bLengthChange: false,
        language: {
            "lengthMenu": "Mostra _MENU_ elementi",
            "zeroRecords": "Nessun materiale trovato",
            "info": "Mostra pagina _PAGE_ di _PAGES_",
            "infoEmpty": "Nessun materiale presente",
            
            "infoFiltered": "(filtra al massimo _MAX_ materiali')",
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
        { data: 'Qta' },
        { data: 'id' },
        { data: 'url',"render": function ( data, type, row, meta ) {
                return "<a href='calendar.php?id=" + row['id']+ "'>" + "Apri" + '</a>';}}
        ]
    } );

 $.ajax({
                    url: "php/materialiRetrieve.php",
                    dataType: "json",
                     success: function(response){
                        $.each(response, function (i,o) {               
                           table.row.add({
                            "Nome": o.Nome,
                            "Descrizione":o.Descrizione,
                            "Qta":o.Qta,
                            "id":o.id,

                           }).draw();
                        });
                    },
                     error: function(){
                        alert('errore carico materiali');
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
    <div align="center"><h2 class="sub-header">Materiale di Zona </h2></div>
   <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered" id = "materiali" name="materiali" cellspacing="0" width="100%">
             <thead>
                <tr>
                  <th>Nome</th>
                  <th>Descrizione</th>
                  <th>Qta</th>
                  <th>id</th>
                  <th>Disponibilita'</th>
                </tr>
                </thead>
                <tbody>
                  
                </tbody>
            </table>
          </div>
  </body>

</html>