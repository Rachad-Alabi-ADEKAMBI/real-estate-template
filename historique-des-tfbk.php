<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}
include 'traitements/db.php';


                         //on determine sur quelle page on se trouve
                                    if (isset($_GET['page']) && !empty($_GET['page'])){
                                        $currentPage = (int) strip_tags($_GET['page']);
                                    
                                    }else{
                                        $currentPage = 1;
                                    }
                                    
                                    //on determine le nombre de clients total
                                    
                                    $sql= "SELECT COUNT(id) AS nb_customers FROM tfbk_history_admin";
                
                                    $query = $pdo->prepare($sql);
                    
                                    $query->execute();
                                    
                                    $numberOfPages = $query->fetch();
                                    
                                    
                                    $nbcustomers = (int) $numberOfPages['nb_customers'];
                                    
                                    //on détermine le nombre de clients par pages
                                    $parPage = 5;
                                    
                                    //On calcule le nombre total de pages
                                    $pages = ceil($nbcustomers / $parPage);
                                    
                                    //Calcul du premier client
                                    $premier = ($currentPage * $parPage) - $parPage; 
                                    
                                    $req = $pdo-> prepare('SELECT date_of_operation,
                                    comment, final_quantity, quantity
                                    FROM tfbk_history_admin
                                    ORDER BY id DESC 
                                    LIMIT :premier, :parpage');
                                    
                                    $req->bindValue(':premier', $premier,  PDO::PARAM_INT);
                                    $req->bindValue(':parpage', $parPage, PDO::PARAM_INT);
                                    
                                    $req->execute();
                                    
                                    $articles = $req->fetchAll();
                                    
                                    $req->closeCursor();
                

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; ?>

   <title>Fineblock - Historique des TFBK</title>
</head>

<body>

<?php include 'header.php';?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading second-heading">
            <div class="dashboard-title">
                <h1>
                    Historique des TFBK
                </h1>
                
                <p>
                    Suivi des transactions
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
                                        <th>Libellé</th>
                                        <th>Quantité</th>
                                        <th>Stock final</th>
                                    </tr>
                                    
                                        <?php
                                                foreach($articles as $article){
                                                    ?>
                                                        <tr>
                                                            <td><?= $article['date_of_operation'] ?></td>
                                                            <td><?= $article['comment'] ?></td>
                                                            <td><?= number_format($article['quantity'], 0, ',', ' '); ?></td>
                                                            <td><?= number_format($article['final_quantity'], 0, ',', ' ') ?></td>
                                                        </tr>
                                                    <?php

                                                }
                                        ?>
                                </table>

                            <ul class="pagination">
                                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                            <a href="historique-des-tfbk.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                        </li>
                                        
                                        <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                            <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                                <a href="historique-des-tfbk.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                            </li>
                                    
                                        <?php endfor ?>
                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                            <a href="historique-des-tfbk.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
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