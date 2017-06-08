<?php

// recupero vaolori delle select
// mi connetto al database
include("connection.php");
$branca = $_GET['branca'];

if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM eventi WHERE Branca = '".$branca."' ";

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

	// ciclo i risultati della query
		    $documenti = array();

	while ($row = mysqli_fetch_assoc($result)) {

		$documenti[] = $row;
	    //
	}
	echo json_encode($documenti);

}
mysqli_close($connection);


?>