<?php session_start(); 

require_once 'traitements/db.php'; 

include 'traitements/traitement-historique-de-transfert.php';

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fineblock - Historique de transfert</title>
</head>

<body>

<?php include 'header.php'; 
?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading dashboard-main">
            <div class="dashboard-title">
                
            <label for="">
                <i class="fas fa-ellipsis-v"></i>
                </label>

                <h1>
                   Historique de transfert
                </h1>

               
            </div>
        </div>

        <div class="dashboard__main__background">
                    <div class="list_customer">
                       
                    <div class="results">
                                <table>
                                    <tr>
                                        <th>Date</th>
                                        <th>Quantité</th>
                                        <th>Libellé</th>
                                    </tr>
                                    
                                        <?php
                                                foreach($articles as $article){
                                                    ?>
                                                        <tr>
                                                            <td><?= $article['date_of_operation'] ?></td>
                                                            <td><?= $article['quantity'] ?></td>
                                                            <td><?= $article['comment'] ?></td>
                                                        </tr>
                                                    <?php

                                                }
                                        ?>
                                </table>

                            <ul class="pagination">
                                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                            <a href="historique-de-transfert.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                        </li>
                                        
                                        <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                            <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                                <a href="historique-de-transfert.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                            </li>
                                    
                                        <?php endfor ?>
                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                            <a href="historique-de-transfert.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                                        </li>
                                    </ul>
                    </div>
              </div>
            </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>