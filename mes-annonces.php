<?php session_start(); 


if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}


require_once 'traitements/db.php'; 

include 'traitements/traitement-mes-annonces.php';

$user_id = $_SESSION['user']['id'];

include 'traitements/db.php'; 

//on recupère le cours du marketcap
$sql = $pdo->prepare("SELECT * FROM tfbk_history_admin 
ORDER BY id DESC LIMIT 1");
$sql->execute();
$res = $sql->fetch();
$marketcap = $res['marketcap'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>
    
    <title>Fineblock - Mes annonces</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="my-sellings">
        <div class="my-sellings__top">
            <h1 class="my-sellings__top__title">
                Mes annonces
            </h1>

                <button >
                       <a href="nouvelle-annonce.php">
                           Nouvelle annonce
                       </a>
                </button>
        </div>

        <div class="my-sellings__bottom">
            <p>
                <a href="espace-personnel.php">
                    <i class="fas fa-long-arrow-alt-left"></i> Retour 
                </a>
            </p>
            
            <?php $ads_nbr = $query->rowCount();  

            if ($ads_nbr == 0) {
                ?> <p class="alert-text"> <br>
                    Vous n'avez posté aucune annonce !!!
                </p> <br><br> <?php
            }
            
            if($ads_nbr != 0){
                foreach($articles as $article){?>
                    <div class="item">
                    <img src="public/images/articles/<?= $article['image_1']; ?>" alt="">
    
                        <div class="item__details">
                            <div class="item__details__infos">
                                <h2>
                                <?= $article['article_name'] ?> <span>(<?= $article['article_status'] ?>)</span>
                                </h2>
    
                                <p class="article_id">
                                        Article numero  <?= $article['id'] ?>
                                        </p>
    
                                <p class="article_price"><strong><?php echo  number_format(($article['euro_price']),2)." €"?></strong>
                            équivalent <span> <?= number_format(($article['euro_price']/$marketcap),4). " points fidélité" ?></span> </p> <br>
                               
                                <p>
                                <?= substr($article["description"], 0, 40). " ...";?>
                                </p>
                            </div>
    
                            <div class="item__details__buttons">
                                
                            <div class="view-button">
                                    <a href="article.php?id=<?= $article['id'] ?>">
                                    <i class="fas fa-search"></i>
                                    </a>
                                </div>
    
                                <div class="delete-button">
                                <a href="supprimer-article.php?article_id=<?= $article['id'] ?> & article_name=<?= $article['article_name'] ?>">
                                <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
    
                                 <div class="edit-button">
                                <a href="modifier-article.php?id=<?= $article['id'] ?>">
                                <i class="fas fa-pen"></i> 
                                    </a>
                                </div>
                
                            </div>
                        </div>
    
                    </div>
                <?php } ?>
                 <ul class="pagination   ">
                 <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                     <a href="mes-annonces.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                 </li>
                 
                 <?php   for ($page = 1; $page <= $pages; $page++): ?>

                     <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                         <a href="mes-annonces.php?page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                     </li>
             
                 <?php endfor ?>
                 <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                     <a href="mes-annonces.php?page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                 </li>
         </ul>
         <?php
            }
            
            ?>

        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>