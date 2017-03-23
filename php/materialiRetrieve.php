<?php

// recupero vaolori delle select
// mi connetto al database

include("connection.php");

if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM materiali";

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

	// ciclo i risultati della query
		    $materiali = array();

	while ($row = mysqli_fetch_assoc($result)) {

		$materiali[] = $row;
	    //
	}
	echo json_encode($materiali);

}
mysqli_close($connection);


?>