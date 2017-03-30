<?php
$fun = $_GET['f'];

switch($fun){
	case "1":
		recuperoCampi();
	break;
	case "2":
		recuperoCase();
	break;
}
function recuperoCampi(){
	include("connection.php");


if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM campo ORDER by id DESC LIMIT 20";

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

	// ciclo i risultati della query
		    $campi = array();
		    $numUp = 0;
echo "[";
	while ($row = mysqli_fetch_assoc($result)) {
echo"{";
		$campi[] = $row;
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
	
	//echo json_encode($campi);
echo "]";
}

mysqli_close($connection);

}
function recuperoCase(){
	include("connection.php");


if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM casa ORDER by id DESC LIMIT 20";

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

	// ciclo i risultati della query
		    $case = array();
		    $numUp = 0;
echo "[";
	while ($row = mysqli_fetch_assoc($result)) {
echo"{";
		$case[] = $row;
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
	
	//echo json_encode($campi);
echo "]";
}

mysqli_close($connection);

}




?>