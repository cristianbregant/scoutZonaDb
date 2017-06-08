<?php

    require("config.php");

$idMateriale = $_POST["id"];
$inizio =$_POST["dataI"];
$ref = $_POST["referente"];
$cellRef = $_POST["numReferente"];
$fine = $_POST["dataF"];
$gruppo = $_POST["gruppo"];
$dataP = date("Y-m-d");
//$materiale = $_POST["materiale"];

if($connection){

	$query = "INSERT INTO calendario (materiale,gruppo,start,end,id_materiale,data_prenotazione) VALUES ('$materiale','$gruppo','$inizio','$fine','$idMateriale','$dataP') ";

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

}


mysqli_close($connection);


?>