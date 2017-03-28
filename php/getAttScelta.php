<?php
include("connection.php");

$id = $_GET["id"];

if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM attivita WHERE id = ".$id;

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

	// ciclo i risultati della query
		    $attivita = array();
		     $numUp = 0;
echo "[";
	while ($row = mysqli_fetch_assoc($result)) {
echo"{";
		$attivita[] = $row;
		$num = count($row);
		//echo $row['Provincia'];
	    //
	    foreach($row as $key => $value){
	    	$numUp+=1;
		echo "\"".$key."\":\"".$value."\"";
		if($numUp<$num){
			echo ",";
		}else{

		} 
		}
		echo "}";
	}
	//echo json_encode($attivita);
echo "]";
}
mysqli_close($connection);





?>