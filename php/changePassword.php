<?php

include ('connection.php');
$pass = mysqli_real_escape_string($connection,$_POST['pass']);
$newP = mysqli_real_escape_string($connection,$_POST['newPass']);
$user = mysqli_real_escape_string($connection,$_POST['user']);


if($connection){
	$queryCheckOld = "SELECT password FROM Utenti WHERE user ='$user'";
	$result = mysqli_query($connection,$queryCheckOld) or die(mysqli_error($connection));

	// ciclo i risultati della query
	while ($row = mysqli_fetch_assoc($result)) {
		$passC = $row;
		if($passC ===$pass){
			$queryChangePass = "UPDATE Utenti SET password = $newP WHERE user = '$user'";
			$resultChange = mysqli_query($connection,$queryChangePass) or die(mysqli_error($connection));
		}
	    
	}
}
mysqli_close($connection);




?>