<?php
/*
	
	Questo file permette di ottenere i campi e le case in risposta
	richiede un parametro f iniziale passato in get dalla chiamata ajax 


*/
$fun = $_GET['f'];
//seleziono quale metodo usare
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
		// estraggo tutti i campi
		$query = "SELECT * FROM campo ORDER by id DESC LIMIT 20";

		$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

		echo "{\"campi\":[";
		printJSON($result);
		echo "]}";
	}

	mysqli_close($connection);

}

function recuperoCase(){
	include("connection.php");


	if($connection){
		// estraggo tutte le case
		$query = "SELECT * FROM casa ORDER by id DESC LIMIT 20";

		$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

		// ciclo i risultati della query

		echo "{\"case:\"[";
		printJSON($result);
		echo "]}";
	}

	mysqli_close($connection);

}

/*
	I risultati vengono buttati fuori con questo metodo, non è il più ottimale 
	ma è l'unico che funziona decentemente ed almeno ho un controllo diretto
	sul formato di uscita.
	Spero che in un futuro questo possa essere sistemato figlio mio, ma questo è
	il massimo che posso fare con la tecnologia della mia era

*/
function printJSON($result){
$numUp = 0;
while ($row = mysqli_fetch_assoc($result)) {
		echo"{";
		//conto il numero di campi che escono dalla query
		$num = count($row);
	    foreach($row as $key => $value){
	    	//conto quanti parametri sono passati
	    	$numUp+=1;
	    	//li scrivo in formato json decente
			echo "\"".$key."\":\"".$value."\"";
			// se è l'ultimo esce e fine altrimenti aggiunge la virgola ed aggiunge un altro paramtro
			if($numUp<$num){
				echo ",";
			}else{
				//none
			} 
		}
		echo "}";
	}
}


?>