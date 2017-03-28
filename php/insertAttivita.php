<?php

$nome = $_POST["nomeAtt"];
$descrizione = $_POST["descrizione"];
$branca = $_POST["branca"];
$autore = $_POST["autore"];
$data = date("Y-m-d");
$link = "aaa";
include("connection.php");
if($connection){
	
$query = "INSERT INTO attivita (Nome,Descrizione,Autore,Branca,DataInserimento,Link_file) VALUES ('$nome','$descrizione','$autore','$branca','$data','$link')";

	$result = mysqli_query($connection,$query) or die(mysqli_error($connection));

	}


mysqli_close($connection);

header("Location: ../paginaMostraAttivita.php");




?>