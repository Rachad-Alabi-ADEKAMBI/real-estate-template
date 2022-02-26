<?php session_start(); 

require_once 'traitements/db.php'; 

include 'traitements/traitement-historique-newsletters.php';

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php  include 'meta.php'; ?>

<title>Fineblock - Historique newsletters</title>
</head>

<body>

<?php include 'header.php'; 
include 'menu.php'
?>

<div class="dashboard">
    <div class="dashboard__menu">
        <?php include 'menu-du-tableau-de-bord.php'; ?>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__main__heading dashboard-main">
            <div class="dashboard-title">
                <h1>
                    Historique newsletters
                </h1>

               
            </div>
        </div>

        <div class="dashboard__main__background">
                    <div class="list_customer">
                       <?php
                  if(!$articles){
                      echo "Aucun message envoyé";
                  }

                  else{
                      ?>
                          <div class="results">
                                <table>
                                    <tr>
                                        <th>Date</th>
                                        <th>Objet</th>  
                                    </tr>
                                    
                                        <?php
                                                foreach($articles as $article){
                                                    ?>
                                                        <tr>
                                                            <td><?php
                                                                  $originalDate = $article['date_of_insertion'];       
                                                                  echo date("d/m/Y", strtotime($originalDate));

                                                            
                                                                 ?></td>
                                                                 <td><?= $article['subject'] ?></td>
                                                            <td>
                                                                            <button class="transfert__button" >
                                                                            <a href="voir-newsletters.php?id=<?= $article['id']?>">
                                                                                Détails
                                                                            
                                                                            </button> <i class="fas fa-eye view"></i>
                                                                            </a>
                                                            </td>

                                                           
                                                    <?php

                                                }
                                        ?>
                                </table>
                                <ul class="pagination">
                                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                                            <a href="historique-newsletters.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                                        </li>
                                        
                                        <?php   for ($page = 1; $page <= $pages; $page++): ?>

                                            <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                                <a href="historique-newsletters.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                            </li>
                                    
                                        <?php endfor ?>
                                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                            <a href="historique-newsletters.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                                        </li>
                                    </ul>
                                   
                    </div>


<?php
                  }



                  ?>
              </div>
            </div>
    </div>
</div>
    <?php include 'footer.php'; ?>
    <script src="public/js/script.js" ></script>
</body>
</html>