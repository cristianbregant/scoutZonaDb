<?php
include("connection.php");

$parola = $_POST['ricerca'];

if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM attivita WHERE Nome RLIKE \"[[:<:]]".$parola."[[:>:]]\"";

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