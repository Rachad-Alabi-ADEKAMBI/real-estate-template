<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

include 'traitements/db.php';
include 'traitements/traitement-details-adherant.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include 'meta.php'; 
   require_once 'traitements/db.php';?>

   <title>Fineblock - Détails des points fidélité adhérant</title>
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
        <div class="dashboard__main__heading">
            <div class="dashboard-title">

           
                <h1>
                    Détails des points fidélité de <?php echo $customer_name; ?>
                </h1>
                
                
            </div>
        </div>

        <div class="dashboard__main__background">

            <div class="list_customer">
                <?php
              
                ?>
                <div class="results">
                            <table>
                                <tr>
                                    <th>Date</th>
                                    <th>Volume</th>
                                    <th>Libellé</th>
                                </tr>
                                
                                    <?php
                                            foreach($articles as $article){
                                                ?>
                                                    <tr>
                                                        <td><?php
                                                        
                                                        $originalDate = $article['date_of_operation'];       
                                                        echo date("d/m/Y", strtotime($originalDate));

                                                         ?></td>
                                                        <td>
                                                        <?php echo number_format($article['quantity'], 2, ',', ' ');  ?></td>
                                                        <td> 
                                                            <?php echo $article['comment'] ?> </td>
                                                    </tr>
                                                <?php
                                            }
                                    ?>

                            <tr>
                               <td>
                                <ul class="pagination">
                                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                        <a href="details-adherant.php??id=<?=$id?>page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                    </li>
                                    
                                    <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                        <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                            <a href="details-adherant.php?id=<?=$id?>&page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                        </li>
                                
                                    <?php endfor ?>
                                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                        <a href="details-adherant.php??id=<?=$id?>page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
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