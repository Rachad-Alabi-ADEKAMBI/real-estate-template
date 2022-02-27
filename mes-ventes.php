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

$sql= "SELECT  COUNT(id) AS nb_customers
 FROM history_ads
WHERE ad_status ='vendu'
AND seller_id = ?";


$query = $pdo->prepare($sql);

$query->execute([$_SESSION['user']['id']]);

$numberOfPages = $query->fetch();

$nbcustomers = (int) $numberOfPages['nb_customers'];

//on détermine le nombre de clients par pages
$parPage = 15;

//On calcule le nombre total de pages
$pages = ceil($nbcustomers / $parPage);

//Calcul du premier client
$premier = ($currentPage * $parPage) - $parPage; 

$req = $pdo-> prepare('SELECT *
FROM history_ads
WHERE ad_status = "vendu"
AND seller_id = :seller_id
ORDER BY id DESC
LIMIT :premier, :parpage');

$req->bindValue(':premier', $premier,  PDO::PARAM_INT);
$req->bindValue(':parpage', $parPage, PDO::PARAM_INT);
$req->bindValue(':seller_id', $_SESSION['user']['id'], PDO::PARAM_INT);

$req->execute();

$articles = $req->fetchAll();

$req->closeCursor();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>    

    <title>Fineblock - Mes ventes</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="history">
        <div class="history__top">
            <div class="history__top__title">
                Mes ventes
            </div>

            <div class="history__top__buttons">
                <button class="view-ads-btn">
                    <a href="nouvelle-annonce.php">
                       Nouvelle annonce
                    </a>
                </button>

               
            </div>
        </div>

        <div class="history__bottom">

        <a href="espace-personnel.php">
                <i class="fas fa-long-arrow-alt-left"></i> Retour 
            </a>
            <?php

                    $sql = $pdo->prepare('SELECT *
                     FROM history_ads WHERE ad_status ="vendu"
                     AND seller_id = ?
                     ORDER BY id DESC 
                     LIMIT 10');

                     $sql->execute(array($_SESSION['user']['id']));

                     $response = $sql->fetch();

                     if(!$response){?>
                     <br> <br>
                     <p class="nothing-to-display">
                        Vous n'avez réalisé aucune vente !
                        </p>
                     <?php
                        
                     }

                     else{

echo "<table border='1' class='history_table' >";
                     echo"<tr><td>Date</td>
                         <td>Article</td><td>Prix en euros</td>
                         <td>Equivalent en PF</td><td>Nom de l'acheteur</td></tr>\n";
                         
 
                         foreach($articles as $datas){

                        $quantity_formated = number_format($datas['article_price'], 0, ',', ' ');
                       // $final_quantity_formated = number_format($datas['final_quantity'], 0, ',', ' ');
                        
                       $price_formated = number_format($datas['selling_price'], 4, ',', ' ');
                        echo"<tr><td>"?>
                         <?php 
                         
                         $originalDate = $datas['date_of_insertion'];       
                         echo date("d/m/Y", strtotime($originalDate));
                         
                         echo "</td>"?> 
                         <?php echo " <td>{$datas['article_name']} </td>"?> 
                          <?php echo"
                             <td>$quantity_formated</td>
                             <td>$price_formated</td>
                             <td> {$datas['customer_name']} </td> </tr>\n";
                     }
 
                         echo "</table>"; ?>

                     <!--    <ul class="pagination   ">
                 <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                     <a href="mes-ventes.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                 </li>
                 
                 <?php   for ($page = 1; $page <= $pages; $page++): ?>

                     <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                         <a href="mes-ventes.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                     </li>
             
                 <?php endfor ?>
                 <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                     <a href="mes-ventes.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                 </li>
         </ul> -->
 
                     
               <?php $req->closeCursor(); ?>


<?php
                     }

                    ?>
        </div>
    </div>
</body>
</html>