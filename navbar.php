 <nav class="navbar navbar-default navbar-static-top">
  <div class="navbar-inner">
      <div class="container-fluid">
        <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navb">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Database zona</a>
        </div>
        <div id="navb" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="paginaMostraCampi.php">Campi/Case</a></li>
            <li><a href="paginaMostraAttivita.php">Attività</a></li>
            <li><a href="materialeZona.php">Materiale di zona</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Eventi Passati<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="eventiLC.php">L/C</a></li>
                <li><a href="eventiEG.php">E/G</a></li>
                <li><a href="eventiRS.php">R/S</a></li>
              </ul>
            </li>
          </ul>
           <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"  role="button" aria-haspopup="true" aria-expanded="false" ><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>   <?php echo $_SESSION['user'] ?>
              <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="php/logout.php">Modifica Password </a></li>
            <li><a href="php/logout.php">Log Out </a></li>
          </ul>
        </li>

        </ul>
        </div><!--/.nav-collapse -->
        </div>
        </div>
    </nav>
