<?php

$ip = "localhost";
$user = "root";
$pass = "";
$db ="zona";


$connection = mysqli_connect($ip,$user,$pass,$db) or die("Error " . mysqli_error($connection));

// Creazione tabelle del database

$queryAttivita = "CREATE TABLE attivita (id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,Nome varchar(100),Descrizione varchar(100),Autore varchar(100),Branca varchar(3),DataInserimento date,Link_file varchar(300),Nome_file varchar(150));";

$queryCampo = "CREATE TABLE campo (id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,Nome_Campo varchar(100),Regione varchar(30),Provincia varchar(30),Comune varchar(30),Coordinate varchar(70),Grandezza_Campo int(11),Acqua varchar(2),Fiume_Vicino varchar(2),Bosco_Vicino varchar(2),Referente varchar(2),Cellulare_Proprietario varchar(30),Descrizione text,Data_ultima_verifica date);";

$queryCasa = "CREATE TABLE casa(id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,Nome_Casa varchar(30),Regione varchar(30),Provincia varchar(30),Comune varchar(30),Coordinate varchar(70),Capienza_Letti int(11),Stanze int(11),Servizi int(11),Referente varchar(100),Cellulare_Referente varchar(15),Descrizione text,id_campo int(11));";

$queryEventi = "CREATE TABLE eventi(id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,Nome varchar(30),Descrizione text,Branca varchar(4),DataInserimento date,Link varchar(255));";

$queryMateriali = "CREATE TABLE materiali (id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,gruppo varchar(25),Nome varchar(50),Descrizione text,Qta int(11));";

$queryCalendario = "CREATE TABLE calendario (id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, materiale varchar(20),gruppo varchar(20),start date,end date, id_materiale int(11), data_prenotazione date);";

$queryUser = "CREATE TABLE user (id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,username varchar(25),password varchar(64),gruppo varchar(25));";
$password = hash('sha256','admin');
$queryCreateUser = "INSERT INTO user(username,password,gruppo) VALUES ('admin','$password','admin')";

if($connection){
	/

	$result1 = mysqli_query($connection,$queryAttivita) or die(mysqli_error($connection));
	$result2 = mysqli_query($connection,$queryCampo) or die(mysqli_error($connection));
	$result3 = mysqli_query($connection,$queryCasa) or die(mysqli_error($connection));
	$result4 = mysqli_query($connection,$queryEventi) or die(mysqli_error($connection));
	$result5 = mysqli_query($connection,$queryUser) or die(mysqli_error($connection));
    $result6 = mysqli_query($connection,$queryMateriali) or die(mysqli_error($connection));
    $result7 = mysqli_query($connection,$queryCalendario) or die(mysqli_error($connection));
	$resultUser = mysqli_query($connection,$queryCreateUser) or die(mysqli_error($connection));

}
mysqli_close($connection);

// Crezione dei file di configurazione del database

$connectionFile = fopen("connection.php", "w") or die("Unable to open file!");
$connection = '<?php $connection = mysqli_connect("'.$ip.'","'.$user.'","'.$pass.'","'.$db.'") or die("Error".mysqli_error($connection));?>';
fwrite($connectionFile, $connection);
fclose($connectionFile);
echo "file connection creato\n";

$configFile = fopen("config.php","w") or die("Unable to open file!");
$config ='<?php

    // These variables define the connection information for your MySQL database
    $username = "'.$user.'";
    $password = "'.$pass.'";
    $host = "'.$ip.'";
    $dbname = "'.$db.'";

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => \'SET NAMES utf8\');
    try { $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); }
    catch(PDOException $ex){ die("Failed to connect to the database: " . $ex->getMessage());}
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    header(\'Content-Type: text/html; charset=utf-8\');
    session_start();
?>
';
// scrittura file
fwrite($configFile,$config);
fclose($configFile);
echo "file config creato";
?>
