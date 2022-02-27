

<div class="dashboard__menu__list" id="menu_2" >
            <div class=" <?php echo $current_page == 'tableau-de-bord.php' ? 'active':NULL ?> menu-link ">
                <a href="tableau-de-bord.php">
                <i class="fas fa-columns"></i>
                <p>Tableau de bord    </p>
            </a>    
            </div>

            <?php 
           if ($_SESSION['user']['role'] === "admin"){?>

<div class=" <?php echo $current_page == 'ajouter-formation.php' ? 'active':NULL ?> menu-link">
                                <a href="ajouter-formation.php">
                                <i class="fas fa-plus-circle"></i>
                                    <p>Nouvelle formation </p>
                                </a>
                    </div>
                    <div class=" <?php echo $current_page == 'liste-des-formations.php' ? 'active':NULL ?> menu-link">
                        <a href="liste-des-formations.php">
                        <?php 
                            $formations = $pdo->prepare("SELECT * FROM formations");
                            $formations->execute();
                            $nbrformations = $formations->rowCount();
                            
                            ?>
                        <i class="fas fa-list"></i>
                            <p>Liste des formations <span>(<?= $nbrformations ?>)</span></p>
                        </a>
                    </div>
                
    <!--
                        <div class=" <?php echo $current_page == 'liste-des-points-fidelite.php' ? 'active':NULL ?> menu-link">
                            <a href="liste-des-points-fidelite.php">
                            <i class="fas fa-search"></i>
                            <p>Liste des formations</p>
                            </a>
                        </div>
            
           -->

                    <div class=" <?php echo $current_page == 'liste-des-bailleurs.php' ? 'active':NULL ?> menu-link">
                    <a href="liste-des-bailleurs.php">
                    <?php 
                        $bailleur = $pdo->prepare("SELECT * FROM users WHERE role ='bailleur'");
                        $bailleur->execute();
                        $nbrbailleur = $bailleur->rowCount();
                        $bailleur->closeCursor();
                        ?>
                    <i class="fas fa-list"></i>
                        <p>Bailleurs <span>(<?= $nbrbailleur ?>)</span></p>
                    </a>
                    </div>


                        

                    <div class=" <?php echo $current_page == 'liste-des-proprietaires.php' ? 'active':NULL ?> menu-link">
                    <a href="liste-des-proprietaires.php">
                    <?php 
                        $proprietaire = $pdo->prepare("SELECT * FROM users WHERE role ='proprietaire'");
                        $proprietaire->execute();
                        $nbrproprietaire = $proprietaire->rowCount();
                        $proprietaire->closeCursor();
                        ?>
                    <i class="fas fa-list"></i>
                        <p>Propriétaires <span>(<?= $nbrproprietaire ?>)</span></p>
                    </a>
                    </div>

                    <div class=" <?php echo $current_page == 'liste-des-locataires.php' ? 'active':NULL ?> menu-link">
                    <a href="liste-des-locataires.php">
                    <?php 
                        $locataire = $pdo->prepare("SELECT * FROM users WHERE role ='locataire'
                        AND account_status='active'");
                        $locataire->execute();
                        $nbrlocataire = $locataire->rowCount();
                        ?>
                    <i class="fas fa-list"></i>
                        <p>Locataires <span>(<?= $nbrlocataire ?>)</span></p>
                    </a>
                    </div>

                    <div class=" <?php echo $current_page == 'simulateurs.php' ? 'active':NULL ?> menu-link">
                    <a href="simulateurs.php">
                    <?php /*
                        $btocc = $pdo->prepare("SELECT * FROM users WHERE role ='btoc'
                        AND account_status='active'");
                        $btocc->execute();
                        $nbrbtocc = $btocc->rowCount();
                        */
                        ?>
                    <i class="fas fa-list"></i>
                        <p>Simulateurs  <span><?php // $nbrbtocc ?></span></p>
                    </a>
                    </div>

                       

                        <div class=" <?php echo $current_page == 'reglements.php' ? 'active':NULL ?> menu-link">
                     
                            <div class="menu-link">
                                <a href="reglements.php">            
                                <i class="fas fa-money-bill-wave"></i>
                                    <p>Règlements</p>
                                </a>
                            </div>
                        </div>

                    

                        <div class="menu-link">
                            <a href="">            
                            <i class="far fa-envelope"></i>
                                <p>Messagerie</p>
                            </a>
                        </div>
                

          <?php
       }

        if ($_SESSION['user']['role'] != "admin"){?>
                      <div class=" <?php echo $current_page == 'ajouter-annonce.php' ? 'active':NULL ?> menu-link">
                                <a href="ajouter-annonce.php">
                                <i class="fas fa-plus-circle"></i>
                                    <p>Nouvelle annonce </p>
                                </a>
                    </div>

                    <div class=" <?php echo $current_page == 'acheter-formation.php' ? 'active':NULL ?> menu-link">
                                <a href="acheter-formation.php">
                                <i class="fas fa-plus-circle"></i>
                                    <p>Acheter une formation </p>
                                </a>
                    </div>
                
                    <div class=" <?php echo $current_page == 'historique-adherant.php' ? 'active':NULL ?> menu-link">
                                <a href="historique-adherant.php">
                                <i class="fas fa-history"></i>
                                    <p>Historique </p>
                                </a>
                    </div>
                
                  <div class=" <?php echo $current_page == 'mon-abonnement.php' ? 'active':NULL ?> menu-link">
                        <a href="mon-abonnement.php">
                        <i class="fas fa-user"></i>
                            <p>Mon abonnement</p>
                        </a>
                    </div>  

       <?php } 
 
      ?>

<div class=" <?php echo $current_page == 'livres.php' ? 'active':NULL ?> menu-link ">
                <a href="livres.php">
                <i class="fa fa-book"></i>
                    <p>Livres</p>
                
                </a>
            </div>



                      
            <div class=" <?php echo $current_page == 'emissions.php' ? 'active':NULL ?> menu-link ">
                <a href="emissions.php">
                <i class="fa fa-video"></i>
                    <p>Emissions</p>
                
                </a>
            </div>


                        
                        <div class=" <?php echo $current_page == 'contact-support.php' ? 'active':NULL ?> menu-link ">
                <a href="contact-support.php">
                <i class="fas fa-headset"></i>
                    <p>Contacter le support</p>
                
                </a>
            </div>
 

        <div class=" <?php echo $current_page == 'parametres.php' ? 'active':NULL ?> menu-link">
          <a href="parametres.php">
          <i class="fas fa-cogs"></i>
              <p>Paramètres</p>
          </a>
          </div>
    </div>
       
