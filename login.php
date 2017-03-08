<?php
    require("php/config.php");
    $submitted_username = '';


    if(!empty($_POST)){
        $query = "SELECT * FROM user WHERE username = :username";
        $query_params = array(':username' => $_POST['user']
        );

        try{
            $stmt = $db->prepare($query);
            //echo "dio";
            $result = $stmt->execute($query_params);
           // echo "dio";
        }
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
        $login_ok = false;
        $row = $stmt->fetch();
        //echo "dio";
        if($row){
          //  echo "dio";
           /* $check_password = hash('sha256', $_POST['password'] . $row['salt']);
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            } */
            if($_POST['pass'] === $row['password']){
                $login_ok = true;
            }
        }

        if($login_ok){
          session_start();
            unset($row['password']);
            $_SESSION['user'] = $row['username'];
            header("Location: index.php");
            die("Redirecting to: index.php");
        }
        else{
            print("Login Failed.");
            $submitted_username = htmlentities($_POST['user'], ENT_QUOTES, 'UTF-8');
        }
    }
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="dist/css/customcss.css">
            <link rel="stylesheet" href="dist/css/loginCss.css">


  
</head>

<body>
  
<div class="pen-title">
  <h1>Database Zona Gorizia</h1>
</div>
<div class="module form-module">
  
  <div class="form">
    <h2>Collegati col tuo account</h2>
    <form action="#" method="post">
      <input type="text" name="user" id="user" placeholder="Username"/>
      <input type="password" name="pass" id="pass" placeholder="Password"/>
      <input type="submit" name ="submit" id="submit" value="Login"/>
    </form>
  </div>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
