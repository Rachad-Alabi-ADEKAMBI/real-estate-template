<?php // include 'traitements/model/frontend.php'; ?>

<html lang="en">
  <head>    
    <link rel="stylesheet" href="public/css/header.css">
    
    <html>
    <head>

        
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">
          <a href="index.php">
          <img src="public/images/logo.png" alt="">
          </a>
      </label>
      <ul>
        <li><a class="<?php echo $current_page == 'accueil.php' ? 'active':NULL ?>" href="accueil.php"> Accueil</a></li>

       <li><a class="<?php echo $current_page == 'depot-d-annonce.php' ? 'active':NULL ?>" href="depot-d-annonce.php"> Dépôt d'annonces </a></li>

       <li><a class="<?php echo $current_page == 'simulateurs.php' ? 'active':NULL ?>" href="simulateurs.php"> Simulateurs </a></li>

       <li><a class="<?php echo $current_page == 'formations.php' ? 'active':NULL ?>" href="formations.php"> Formations </a></li>

       <li><a class="<?php echo $current_page == 'emissions.php' ? 'active':NULL ?>" href="emissions.php"> Emissions </a></li>

            
   
        <li><a class="<?php echo $current_page == 'partenaires.php' ? 'active':NULL ?>" href="estimation-immobiliere.php"> Estimation immobilière </a></li>
         <?php
        if(!isset($_SESSION["user"])): ?>
          <li><a class="login-link <?php echo $current_page == 'connexion.php' ? 'active':NULL ?>" href="connexion.php"></i> Connexion</a></li>

        <?php else: ?>

          <li><a class="<?php echo $current_page == 'tableau-de-bord.php' ? 'active':NULL ?>" href="tableau-de-bord.php"> Espace</a></li>


        <li><a href="deconnexion.php" class=""> <i class="fa fa-door-open"></i></a></li>

        <?php endif;  ?>
      </ul>
    </nav>
    <section></section>
  </body>