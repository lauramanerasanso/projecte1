<?php

    $traduccionsHead = [["Tenda de na Laura", "Idioma"],["Tienda de Laura", "Idioma"],["Laura's shop", "Language"]];

?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">
        <?php if($_SESSION['lang']=='EN'){ echo $traduccionsHead[2][0];}else if($_SESSION['lang']=='ES'){ echo $traduccionsHead[1][0];}else{echo $traduccionsHead[0][0];} ?>
        </a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href="../index.php"><i class="fas fa-home"></i></a>
              </li>
              <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="idioma" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <?php if($_SESSION['lang']=='EN'){ echo $traduccionsHead[2][1];}else if($_SESSION['lang']=='ES'){ echo $traduccionsHead[1][1];}else{echo $traduccionsHead[0][1];} ?>
                      </a>
                      <div class="dropdown-menu" role="menu" aria-labelledby="idoma">
                        <a class="dropdown-item" href="../php/idioma.php?lang=CA"> CA</a>
                        <a class="dropdown-item" href="../php/idioma.php?lang=ES"> ES</a>
                        <a class="dropdown-item" href="../php/idioma.php?lang=EN"> EN</a>
                      </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="../php/cart.php"><i class="fas fa-shopping-cart"></i></a>
              </li>

            </ul>
        </div>
</nav>