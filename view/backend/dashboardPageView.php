<?php //session_start(); 

/*
if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}
*/

$title = "Fares Immobilier - Tableau de bord";

ob_start(); ?>  

<div class="dashboard" style="padding-top: 100px">
    <div class="dashboard__menu">
        <?php 
        include 'dashboardMenuView.php';
        
         ?> 
    </div>

    <div class="dashboard__main">
   

        <div class="dashboard__main__heading main-heading">
            <div class="dashboard-title">
                <h1>
                    Espace Admin 
                    <span class="date" style ="font-size: 0.8em; font-weight: 200;">
                    <?php 
                          $DateAndTime = date('d/m/Y', time());  
                          echo "ce " .$DateAndTime ;
                    ?>
                    </span>
                    </h1>
                    
                    <p>
                    Content de vous revoir <span> Rachad</span>, 
                    que souhaitez vous faire ?
                </p>
                
            </div>
        </div>

        <div class="dashboard__main__background long-background">

    <div class="boxes">
                    <div class="boxes__item">
                            <strong>30 <br>
                            <span> Adhérants</span>
                         </strong>
                    </div>

                    <div class="boxes__item">
                    <strong>20 <br>
                            <span> Formations</span>
                         </strong>
                    </div>

                    <div class="boxes__item">
                    <strong>10 <br>
                            <span> Dossiers en cours</span>
                         </strong>
                    </div>
    </div>    
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>