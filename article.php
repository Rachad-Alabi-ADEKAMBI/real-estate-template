<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}
  include 'traitements/db.php';
  include 'traitements/traitement-article.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>
    
    <title>Fineblock - Fiche produit</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="article">
        <?php while ($product = $req->fetch()){?>
        <a href="toutes-les-annonces.php">
                    <i class="fas fa-long-arrow-alt-left"></i> Toutes les annonces
                </a>

        <p class="article__category">
            Listé dans la catégorie: <span> <?= $product['category_name'] ?></span>
        </p>

        <div class="article__content">
            <img src="public/images/articles/<?= $product['image_1']; ?>" alt="">
            
            <div class="article__content__details">
                <h1 class="article-name">
                Nom: <span><?= $product['article_name'] ?></span>
                </h1> <br>

                <p class="article-price">
                    Prix: <strong><?php echo  (number_format(($product['euro_price']/$valueOfMarketCap),4))." points fidélité"?>
                        </strong>  (équivalent: <span> <?= number_format($product['euro_price'], 3, ',', ' ')." €" ?></span>)
                </p> <br>

                <p class="article-description">
                    Description: <p> <?= $product['description'] ?>            
                 </p> <br>

                 <?php
                    if ($product['seller_id'] != $_SESSION['user']['id']){
                        ?>

                    <div class="buttons">
                            <button>
                                <a href="achat-direct.php?id=<?=$product['id'] ?>">Achat direct</a>
                            </button>

                            <button>
                            <a href="nouveau-message.php?article_id=<?=$product['id']?>">
                            Contacter le vendeur
                            </button>
                    </div>
                    <?php }  ?>
            </div>
        </div>

        <?php if ($product['brand'] || $product['model'] 
             || $product['year']  || $product['state']) {?>
                                <h2 class="article__description">
                                    Autres informations
                                </h2> <br>
                        <?php   } ?>


            <table>
                    
                        <?php if ($product['brand'] ) {?>
                            <tr><td>Marque: <span style="color: #222563; "><?= $product['brand'] ?></span></td>
                            </tr>
                        <?php   } ?>

                        <?php if ($product['model']) {?>
                            <tr><td>Modèle:  <span style="color: #222563; "><?= $product['model'] ?></span> </td>
                            </tr>
                        <?php   } ?>

                        <?php if ($product['year']) {?>
                            <tr><td>Année d'achat: <span style="color: #222563; "><?= $product['year'] ?></span></td>
                            </tr>
                        <?php   } ?>

                        <?php if ($product['state']) {?>
                            <tr><td>Etat: <span style="color: #222563; "><?= $product['state'] ?></span> </td>
                            </tr>
                        <?php   } ?>
            </table> <br>

        <h2 class="vendor-name">
                Informations sur le vendeur
            </h2>

        <div class="vendor-informations">
            <div class="vendor-informations__details">
                <p>Pseudonyme:<span style="color: #222563; "><?= $product['seller_name'] ?></span> </p>
              
                <p>Nombre de ventes: <span style="color: #222563;">
<?php
//On détermine le nombre total de ventes 

    $sql = $pdo->prepare("SELECT * FROM history_ads
    WHERE seller_id = ? AND ad_status ='close'");

    $sql->execute(array($product['seller_id']));

    $totalSellings = $sql->rowCount();

    echo $totalSellings;
?>
                </span></p>
            </div>

                <?php } ?>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>