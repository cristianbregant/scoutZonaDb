<?php
include ("connection.php");
$materiale = $_GET['materiale'];
if($connection){
	// estraggo tutte le regioni
	$query = "SELECT * FROM calendario WHERE id_materiale = ".$materiale." ";

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

	// ciclo i risultati della query
		    $prenotazioni = array();

	while ($singola_p = mysqli_fetch_assoc($result)) {
		$singola_pCorretta = array("title"=>$singola_p["gruppo"],"start"=>$singola_p["start"],"end"=>$singola_p["end"]);


		$prenotazioni[] = $singola_pCorretta;
	    //
	}
	echo json_encode($prenotazioni);

}
mysqli_close($connection);
/*
$myArr1 = array("title"=>"test","start"=> "2017-02-10","end"=> "2017-02-15");
$myArr2 = array("title"=>"test","start"=> "2017-02-18","end"=> "2017-02-25");
$myJSON1 = json_encode($myArr1);
$myJSON2 = json_encode($myArr2);
echo '['.$myJSON1.','.$myJSON2.']'; 
*/
?>