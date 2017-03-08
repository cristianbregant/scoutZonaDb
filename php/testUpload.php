<?php

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$desc = $_POST['description'];
$branca = $_POST['branca'];
$target_dir = "../uploads/".$branca."/";
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
   /* $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }*/
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
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

        $connection = mysqli_connect("localhost","root","","zona") or die("Error " . mysqli_error($connection));

        if($connection){
            $nome = basename( $_FILES["fileToUpload"]["name"]);
            $link = "localhost/uploads/".$branca."/".$nome;

         $query = "INSERT INTO eventi (Nome,Descrizione,Branca,DataInserimento,Link) VALUES ('".$nome."','".$desc."','".$branca."','".date("Y/m/d")."','".$link."')";
         $result = mysqli_query($connection,$query) or die(mysqli_error($connection));

    // ciclo i risultati della query
        }
        mysqli_close($connection);
          header("Location: ../eventi".$branca.".php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>