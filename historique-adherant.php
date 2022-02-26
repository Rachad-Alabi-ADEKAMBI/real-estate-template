<?php session_start(); 

require_once 'traitements/db.php'; 

// include 'traitements/traitement-historique-adherant.php';

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fares Immobilier - Historique</title>
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
        <div class="dashboard__main__heading dashboard-main">
            <div class="dashboard-title">
                
                <h1>
                   Historique 
                </h1>

               
            </div>
        </div>

        <div class="dashboard__main__background">
                    <div class="list_customer">
                       
                    <div class="results">
                        <p class="nothing-to-display">
                            Aucun élément
                        </p>
                              <!--  <table>
                                    <tr>
                                        <th>Date</th>
                                        <th>Quantité</th>
                                        <th>Libellé</th>
                                        <th>Expéditeur</th>
                                        <th>Bénéficiaire</th>
                                    </tr>
                                    
                                        <?php
                                                foreach($articles as $article){
                                                    ?>
                                                        <tr>
                                                            <td><?php
                                                            $originalDate =   $article['date_of_operation'] ;       
                                                            echo date("d/m/Y", strtotime($originalDate)); ?>
    
                                                           </td>
                                                            <td><?php echo number_format($article['quantity'], 2, ',', ' ') ?></td>
                                                            <td><?= $article['comment'] ?></td>
                                                            <td><?= $article['sender_name'] ?></td>
                                                            <td><?= $article['receiver_name'] ?></td>
                                                        </tr>
                                                    <?php

                                                }
                                        ?>
                                 <tr>
                                        <td></td>
                                        <td></td>
                                        <td> <ul class="pagination">
                                              <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                            <a href="historique-adherant.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                        
                                        
                                        <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                            <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                                <a href="historique-adherant.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                            </li>
                                    
                                        <?php endfor ?>
                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                            <a href="historique-adherant.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                                        </li>
                                    </ul></td>
                                    </tr> -->
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