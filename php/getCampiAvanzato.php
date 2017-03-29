<?php
include("connection.php");


if (isset($_GET['nome'])){
	$nome = $_GET['nome'];
	$stringNome = "Nome_Campo = '$nome'";
}else{
	$stringNome = "";
}

if(isset($_GET['acqua'])){
	$acqua = $_GET['acqua'];
	switch($acqua){
		case "SI":
		$stringAcqua = "Acqua = SI";
		break;
		case "NO":
		$stringAcqua = "Acqua = NO";
		break;
		case "NF":
		$stringAcqua = "";
		break;
	}
	if(isset($stringNome)&&isset($stringAcqua)){
		$stringAcqua = "AND ".$stringAcqua;
	}	
}else{
	$stringAcqua = "";
}



if(isset($_POST['bosco'])){
	$bosco = $_POST['bosco'];
	switch($bosco){
		case "SI":
		$stringBosco = "Bosco_Vicino = SI";
		break;
		case "NO":
		$stringBosco = "Bosco_Vicino = NO";
		break;
		case "NF":
		$stringBosco = "";
		break;
	}
	if(isset($stringBosco)&&(isset($stringNome)||isset($stringAcqua))){
		$stringBosco = "AND ".$stringBosco;
	}	
}else{
	$stringBosco = "";
}

if(isset($_POST['fiume'])){
	$fiume = $_POST['fiume'];
	switch($fiume){
		case "SI":
		$stringFiume = "Fiume_Vicino = SI";
		break;
		case "NO":
		$stringFiume = "Fiume_Vicino = NO";
		break;
		case "NF":
		$stringFiume = "";
		break;
	}
	if(isset($stringFiume)&&(isset($stringNome)||isset($stringBosco)||isset($stringAcqua))){
		$stringFiume= "AND ".$stringFiume;
	}
}else{
	$stringFiume = "";
}



$parametriQuery = $stringNome.$stringAcqua.$stringBosco.$stringFiume;

if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM campo WHERE $parametriQuery";

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





?>