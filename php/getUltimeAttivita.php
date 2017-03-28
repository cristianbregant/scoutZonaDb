<?php
include("connection.php");

if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM attivita ORDER by id DESC LIMIT 20";

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

	// ciclo i risultati della query
		    $attivita = array();

	while ($row = mysqli_fetch_assoc($result)) {

		$attivita[] = $row;
	    //
	}
	echo json_encode($attivita);

}
mysqli_close($connection);





?>