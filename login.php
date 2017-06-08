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
            $check_password = hash('sha256', $_POST['pass']);
           /* for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password);
                //echo $check_password;
            } */
            if($check_password === $row['password']){
                $login_ok = true;
            }
        }

        if($login_ok){
          session_start();
            unset($row['password']);
            $_SESSION['user'] = $row['username'];
            $_SESSION['gruppo'] = $row['gruppo'];
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

      <style type="text/css">
      body{
        background-image: url("dist/img/background_login.jpg");
      }
      </style>
      <link href="dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="dist/css/signin.css">
</head>

<body>

 <div class="container">
   <div class="panelDesc">
      <img src="dist/img/logoAgesci.png" height="135" width="120"/>
     <div>
     <br>
      <h2>Benvenuto! <br></h2>
      <p><font size="4">Questo è il nuovo database della Zona Scout di Gorizia,<br> per accedere ai contenuti si prega di effettuare il login con le proprie credenziali </font></p> 
    </div>
    <div class="clear"></div>
   </div>

  <div class="panelLogin">
    <form class="form-signin" method="POST" action="#">
        <h2 class="form-signin-heading">Accedi</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="user" name="user" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Ricordami
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Accedi</button>
      </form>
  </div>
</div>
                                <!-- Change this to a button or input when using this as a form -->
 
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>