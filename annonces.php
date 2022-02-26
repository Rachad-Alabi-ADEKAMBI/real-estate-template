<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}
  include 'traitements/db.php';
  include 'traitements/traitement-annonces.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock - Annonces</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="annonces">
            <div class="annonces__top">
                <h1 class="annonces__top__title" >
                    Bourse de change - Accueil
                </h1>

                <p class="annonces__top__text">
                Cette bourse de change est destinée à  
                vendre en ligne, tout bien mobilier dans 
                ces rubriques : Auto, Moto, Bateau, vélo 
                électrique ou non) meubles, mobilier de 
                jardin d’une valeur supérieur à 100 € et 
                sans limite de prix, car payable uniquement 
                en TFBK, donc réservé exclusivement aux 
                Adhérents de FINEBLOCK.
                </p>

                <?php
                    if($_SESSION['user']['role'] == 'btob' ||
                    $_SESSION['user']['role'] == 'btoc'  ){
                    ?>
                     <button>
                    <a href="espace-personnel.php">
                        Accéder à mon espace personnel
                    </a>
                </button>

                    <?php } ?>
                
 

               
            </div>

            <div class="annonces__research">
                 <!--    <a href="toutes-les-categories.php">
                        Toutes les catégories <i class="fas fa-long-arrow-alt-right"></i>
                    </a> <br>
                    -->
            
                <div class="annonces__research__pics">

              
                    
                    <?php while ($product = $reponse->fetch()){?>

                       <a href="">
                       <div class="category-pic">
                        
                        <img src="<?=$product['category_picture']?>" alt="">
                        
                            <p><?=$product['category_name']?></p>
                    </div>

                       </a> 
                    <?php } ?>
                </div>

               
            </div>

            <div class="annonces__recommanded">
                <h2 class="annonces__recommanded__title">
                    Dernières annonces
                </h2>

                <p class="annonces__recommanded__link">
                    <a href="toutes-les-annonces.php">
                    Voir plus <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
               
                </p> <br>

               

                <div class="annonces__recommanded__products">
                    <?php 
                        $number = $req->RowCount();

                       if($number > 0){
                        while ($product = $req->fetch()){
                        
                            ?>
    
                            <div class="product">
                                <div class="product__image">
                                    <img src="public/images/articles/<?= $product['image_1']; ?>" alt="">
                                </div>
    
                                <p class="product__name"><?php echo $product['article_name'] ?></p>
                                
                                <p class="product__price"><?php echo  number_format($product['euro_price'],2)." €"?></p>
                            
                                <p class="product__location">
                                <i class="fas fa-map-marker-alt"></i> <?= $product['location'] ?>
                                </p>
    
                                <p class="product__description"><?= substr($product["description"], 0, 20); echo ' ...'  ?></p> 
    
                                <p class="product__seller">Vendeur: <?= $product['seller_name'] ?> </p>
    
                                <button>
                                    <a href="article.php?id=<?=$product['id']?>">
                                        Voir article
                                    </a>
                                </button>
                            </div>
                        <?php } 
                       }

                       else{
                            ?>
                                <p class="nothing-to-display">
                                    Aucun article à afficher
                                </p>
                            <?php
                       } ?>
                  
                </div>
            </div>

            <div class="annonces__recommanded">
                <h2 class="annonces__recommanded__title">
                    Articles les plus consultés
                </h2>

                <p class="annonces__recommanded__link">
                    <a href="toutes-les-annonces.php">
                        Voir plus <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
               
                </p> 

                <div class="annonces__recommanded__products">

              
              <?php
                $nbr = $last->RowCount();

                if ($nbr > 0){
                    while ($product = $last->fetch()){ ?>

                        <div class="product">
                            <div class="product__image">
                                <img src="public/images/articles/<?= $product['image_1']; ?>" alt="">
                            </div>
    
                            <p class="product__name"><?php echo $product['article_name'] ?></p>
    
                            <p class="product__price"><?php echo  number_format($product['euro_price'],2)." €"?></p>
                            
                            <p class="product__location">
                            <i class="fas fa-map-marker-alt"></i><?= $product['location'] ?></p>
                            </p>
    
                            <p class="product__description">
                            <p><?= substr($product["description"], 0, 20); echo ' ...'  ?></p>
                            </p> 
    
                            <p class="product__seller">Vendeur: <?= $product['seller_name'] ?> </p>
    
                            <button>
                                <a href="article.php?id=<?=$product['id']?>">
                                    Voir article
                                </a>
                            </button>
                        </div>   
                    <?php }
                }

                else{
                    ?>
                    <p class="nothing-to-display">
                        Aucun article à afficher
                    </p>
                    <?php
                }
              ?>
            </div>  
        </div>
    <?php include 'footer.php'; ?>
</body>
</html>