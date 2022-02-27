<!--page de menu mobile du tableau de bord principal  -->

<?php require_once 'traitements/functions.php'; ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
  <body>
    <nav class="nav2" >
      <input type="checkbox" id="checkk">
      <label for="checkk" class="checkbutton">
        <i class="fas fa-bars"></i>
      </label>
      <ul class="list">
      <li><a class="<?php echo $current_page == 'tableau-de-bord.php' ? 'active':NULL ?>" href="tableau-de-bord.php"><i class="fas fa-columns"></i> Tableau de bord</a></li>
            <?php if ($_SESSION['user']['role'] != 'admin'){?>

               <li><a class="<?php echo $current_page == 'ajouter-annonce.php' ? 'active':NULL ?>"  href="." >
               <i class="fas fa-plus-circle"></i> Nouvelle annonce</a></li> 
       
               <li><a class="<?php echo $current_page == 'acheter-formation.php' ? 'active':NULL ?>"  href="" >
               <i class="fas fa-plus-circle"></i>Acheter un formation</a></li> 
       

               <li><a class="<?php echo $current_page == 'historique-adherant.php' ? 'active':NULL ?>" href="historique-adherant.php" > <i class="fas fa-history"></i> Historique</a></li> 

                <li><a class="<?php echo $current_page == 'mon-abonnement.php' ? 'active':NULL ?>" href="" >  <i class="fas fa-user"></i> Mon abonnement</a></li> 

        
           <?php }

          
          if ($_SESSION['user']['role'] == 'admin'){?>

               <li><a class="<?php echo $current_page == 'historique-d-actualisation.php' ? 'active':NULL ?>" href="historique-adherant.php" >
               <i class="fas fa-list"></i> Liste des formations</a></li> 

            
                <li><a class="<?php echo $current_page == 'liste-des-bailleurs.php' ? 'active':NULL ?>" href="liste-des-bailleurs.php" ><i class="fas fa-list"></i>
                 Bailleurs</a></li> 

                 <li><a class="<?php echo $current_page == 'liste-des-bailleurs.php' ? 'active':NULL ?>" href="liste-des-proprietaires.php" ><i class="fas fa-list"></i>
                 Propriétaires</a></li> 

                 <li><a class="<?php echo $current_page == 'liste-des-locataires.php' ? 'active':NULL ?>" href="liste-des-locataires.php" ><i class="fas fa-list"></i>
                 locataires</a></li> 

                 <li><a class="<?php echo $current_page == 'simulateurs.php' ? 'active':NULL ?>" href="simulateurs.php" ><i class="fas fa-list"></i>
                 Simulateurs</a></li> 


                <li><a class="<?php echo $current_page == '' ? 'active':NULL ?>" href="" > <i class="far fa-envelope"></i> Messagerie</a></li> 

              

                <li><a class="<?php echo $current_page == 'reglements.php' ? 'active':NULL ?>" href="reglements.php" ><i class="fas fa-money-bill-wave"></i> Règlements</a></li> 
                

         
              
         <?php } ?>
         

         <li><a class="<?php echo $current_page == 'livres.php' ? 'active':NULL ?>" href="livres.php" >
          <i class="fa fa-book"></i></i> Livres </a></li> 

         
          <li><a class="<?php echo $current_page == 'emissions.php' ? 'active':NULL ?>" href="emissions.php" > 
           <i class="fas fa-newspaper"></i> Emissions </a></li> 
          
                <li><a class="<?php echo $current_page == 'contact-support.php' ? 'active':NULL ?>" href="contact-support.php" >  <i class="fas fa-headset"></i> Contacter le support</a></li> 


          <li><a class="<?php echo $current_page == 'parametres.php' ? 'active':NULL ?>" href="parametres.php" >  <i class="fas fa-cogs"></i> Paramètres</a></li> 
            
      </ul>
    </nav>
    <section></section>

    <style>
  .nav2{
    height: 80px;
    margin: 60px auto;
    width: 100%;
    position: fixed;
    background-color: white;
    z-index: 99999;
    display: none;
    
  }

  .nav2 .list{
    float: right;
    height: 100vh;
    margin-right: 0;
    padding-top: 0;
  }
  
  .nav2 ul li{
    display: inline-block;
    line-height: 80px;
    margin: 0 5px;
  
  }

  .nav2 ul li a{
    font-size: 1.1em;
    font-weight: bold;
    border-radius: 3px;
    margin: auto 10px;
    cursor: pointer;
  }
  .checkbutton{
    font-size: 30px;
    color: white;
    float: right;
    line-height: 80px;
    margin-right: 40px;
    cursor: pointer;
    display: none;
  }
  #checkk{
    display: none;
  }
  @media (max-width: 952px){
    .nav2 ul li a{
      font-size: 16px;
    }
  }
  @media (max-width: 1279px){
    .checkbutton{
      display: block;
    }

    .checkbutton i{
      color: #D1AF52;
    }

    .checkbutton:hover i{
      z-index:  -9999;
    }

    .nav2{
        position: fixed;
        z-index: 9999;
        display: block;
        background:  #212121;
    }
    
    .list{
      position: fixed;
      margin: -120px auto;
      height: 100vh;
      width: 80%;
      height: auto;
      background: white;
      left: -100%;
      z-index: 999;
      text-align: center;
      transition: all .5s;
    }
    .nav2 .list li{
      display: block;
      margin: 8px 0;
      line-height: 30px;
      padding-top: 0;
      text-align: left;
    }

    .nav2 .list li a{
      font-size: 20px;
    }
    a:hover,a.active{
      background: none;
      color:  #D1AF52;
    }
    #checkk:checked ~ ul{
      left: 0;
    }
  }
  section{
    background-size: cover;
    z-index: 1;
    opacity: 1;
  }
    </style>

  </body>
</html>