<?php
//test modify
include("connection.php");

$uploadOk = 1;
$nome = $_POST["nomeAtt"];
$descrizione = $_POST["descrizione"];
$branca = $_POST["branca"];
$autore = $_POST["autore"];
$data = date("Y-m-d");
$target_dir = "../uploads/att/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
    echo "Sorry, only JPG, JPEG, PNG, PDF & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        if($connection){
            $nome_file = basename( $_FILES["fileToUpload"]["name"]);
            $link = "www.scoutgorizia3.it/SCOUTGO3/database/uploads/att/".$nome_file;

$query = "INSERT INTO attivita (Nome,Descrizione,Autore,Branca,DataInserimento,Link_file,Nome_file) VALUES ('$nome','$descrizione','$autore','$branca','$data','$link','$nome_file')"; 
        $result = mysqli_query($connection,$query) or die(mysqli_error($connection));

    // ciclo i risultati della query
        }
        mysqli_close($connection);
          header("Location: ../paginaMostraAttivita.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>