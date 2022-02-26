<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}
include 'traitements/db.php';
include 'traitements/traitement-historique-d-actualisation.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; ?>

   <title>Fineblock - Historique d'actualisation</title>
</head>

<body>

<?php include 'header.php';
include 'menu.php';
?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading second-heading">
            <div class="dashboard-title">
                <h1>
                    Historique d'actualisation
                </h1>
                
                <p>
                    Suivi de l'actualisation du stock
                </p>
            </div>

        </div>

        <div class="dashboard__main__background">
        <div class="transfert">

            </div>

            <div class="list_customer">
            <div class="results">
                                <table>
                                    <tr>
                                        <th>Date</th>
                                        <th>Volume</th>
                                    </tr>
                                    
                                        <?php
                                                foreach($articles as $article){
                                                    ?>
                                                        <tr>
                                                            <td><?php
                                                                 $originalDate =  $article['date_of_operation'];       
                                                                 echo date("d/m/Y", strtotime($originalDate));
         
                                                            ?></td>
                                                             <td><?= number_format($article['quantity'], 0, ',', ' '); ?></td>
                                                        </tr>
                                                    <?php

                                                }
                                        ?>
                                        <tr>
                                            
                                            <td></td>
                                            <td>
                                            <ul class="pagination">
                                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                            <a href="historique-d-actualisation.php'?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                        </li>
                                        
                                        <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                            <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                                <a href="historique-d-actualisation.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                            </li>
                                    
                                        <?php endfor ?>
                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                            <a href="historique-d-actualisation.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                                        </li>
                                    </ul>
                                            </td>
                                        </tr>
                                </table>
                    </div>
            </div>
        </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>