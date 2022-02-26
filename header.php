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
        <li><a class="<?php echo $current_page == 'partenaires.php' ? 'active':NULL ?>" href="depot-de-manuscrit.php"> Dépôt de Manuscrit </a></li>
       
   
        <li><a class="<?php echo $current_page == 'partenaires.php' ? 'active':NULL ?>" href="estimation-immobiliere.php"> Estimation immobilière </a></li>
        <li><a class="<?php echo $current_page == 'partenaires.php' ? 'active':NULL ?>" href=""></i> Location </a></li>
        <?php
        if(!isset($_SESSION["user"])): ?>
          <li><a class="login-link <?php echo $current_page == 'connexion.php' ? 'active':NULL ?>" href="connexion.php"></i> Connexion</a></li>

        <?php else: ?>

          <li><a class="<?php echo $current_page == 'tableau-de-bord.php' ? 'active':NULL ?>" href="tableau-de-bord.php"> Tableau de bord</a></li>


        <li><a href="deconnexion.php" class=""> Deconnexion</a></li>

        <?php endif;  ?>
      </ul>
    </nav>
    <section></section>
  </body>