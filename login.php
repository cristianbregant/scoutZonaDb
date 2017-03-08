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
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="dist/css/customcss.css">



  <style>
body {background-image: url("dist/img/background.jpg");}
</style>
</head>

<body>

 <div class="container">
        <div class="row"><br><br>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Accedi</h3>
                    </div>
                    <div class="panel-body">
                      <form action="#" method="post">
                       <fieldset>
                        <div class="form-group">

                        <input type="text" name="user" id="user" required class="form-control" placeholder="Username"/>

                        </div>
                        <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                        </div>
                           <input type="submit" class="btn btn-lg btn-success btn-block" value="Login"/>
                          </fieldset>
                        </form>
                      </div>
          </div>
      </div>
  </div>
</div>
                                <!-- Change this to a button or input when using this as a form -->
 
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
