<?php


$fun=$_GET['f'];
switch($fun){
	case "1":
		funzioneCampi();
		break;
	case "2":
		funzioneCase();
		break;
}

//get campo avanzato 
function funzioneCampi(){
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
		$stringAcqua = "Acqua = 'SI'";
		break;
		case "NO":
		$stringAcqua = "Acqua = 'NO'";
		break;
		case "NF":
		$stringAcqua = "";
		break;
	}
	if($stringNome !== '' && $stringAcqua !== ''){
		$stringAcqua = "AND ".$stringAcqua;
	}	
}else{
	$stringAcqua = "";
}



if(isset($_GET['bosco'])){
	$bosco = $_GET['bosco'];
	switch($bosco){
		case "SI":
		$stringBosco = "Bosco_Vicino = 'SI'";
		break;
		case "NO":
		$stringBosco = "Bosco_Vicino = 'NO'";
		break;
		case "NF":
		$stringBosco = "";
		break;
	}
	if($stringBosco !== '' && ($stringNome !== '' || $stringAcqua !== '')){
		$stringBosco = "AND ".$stringBosco;
	}	
}else{
	$stringBosco = "";
}

if(isset($_GET['fiume'])){
	$fiume = $_GET['fiume'];
	switch($fiume){
		case "SI":
		$stringFiume = "Fiume_Vicino = 'SI'";
		break;
		case "NO":
		$stringFiume = "Fiume_Vicino = 'NO'";
		break;
		case "NF":
		$stringFiume = "";
		break;
	}
	if($stringFiume !== '' &&($stringNome !== '' || $stringBosco !== '' || $stringAcqua !== '')){
		$stringFiume= "AND ".$stringFiume;
	}
}else{
	$stringFiume = "";
}



$parametriQuery = $stringNome.$stringAcqua.$stringBosco.$stringFiume;

if($connection){
	// estraggo tutte le regioni
	if($parametriQuery){
		$query = "SELECT * FROM campo WHERE $parametriQuery";
	}else{
		$query = "SELECT * FROM campo";
	}
	
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
function funzioneCase(){
	include("connection.php");

	if (isset($_GET['nome'])){
	$nome = $_GET['nome'];
	$stringNome = "Nome_Casa = '$nome'";
}else{
	$stringNome = "";
}

if(isset($_GET['posti'])){
	$posti = $_GET['posti'];
	$stringPosti = "Capienza_Letti = '$posti'";
	if($stringNome !== '' && $posti !== ''){
		$stringPosti = "AND ".$stringPosti;
	}	
}else{
	$stringPosti = "";
}



if(isset($_GET['stanze'])){
	$stanze = $_GET['stanze'];
	$stringStanze = "Stanze = '$stanze'";
	if($stanze !== '' && ($stringNome !== '' || $stringPosti !== '')){
		$stringStanze = "AND ".$stringStanze;
	}	
}else{
	$stringStanze = "";
}



$parametriQuery = $stringNome.$stringPosti.$stringStanze;

if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM casa WHERE $parametriQuery";

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