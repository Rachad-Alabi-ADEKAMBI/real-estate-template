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

$query = $pdo->prepare('SELECT  *
FROM categories
WHERE id=?');
              
$query->execute(array($_GET['id']));

while($datas = $query->fetch()){
    $category_name = $datas['category_name'];
}


//on determine le nombre de clients total

$sql= "SELECT COUNT(id) AS nb_customers FROM 
articles WHERE category_name = ?
 ";

$query = $pdo->prepare($sql);

$query->execute(array($category_name));

$numberOfPages = $query->fetch();

$nbcustomers = (int) $numberOfPages['nb_customers'];

//on détermine le nombre de clients par pages
$parPage = 10;

//On calcule le nombre total de pages
$pages = ceil($nbcustomers / $parPage);

//Calcul du premier client
$premier = ($currentPage * $parPage) - $parPage; 

$query = $pdo-> prepare('SELECT *
FROM articles
WHERE category_name = :category_name
ORDER BY id DESC
LIMIT :premier, :parpage');

$query->bindValue(':category_name', $category_name,  PDO::PARAM_INT);
$query->bindValue(':premier', $premier,  PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

$query->execute();

$articles = $query->fetchAll();

$query->closeCursor();


if ($_GET['id'] <= 0){
    header("Location: index.php");
}

  
    

  // nom de la catégotie
  $query = $pdo->prepare('SELECT  *
FROM categories
WHERE id=?');
              
$query->execute(array($_GET['id']));

while($datas = $query->fetch()){
    $category_name = $datas['category_name'];
}

$req = $pdo->prepare('SELECT  *
FROM articles
WHERE category_name=? AND article_status="en vente"');
            
$req->execute(array($category_name));

$count = $req->rowCount();

if (!$category_name){
    header("Location: index.php");
}



//recupération du marketcap
$sql = $pdo->prepare("SELECT * FROM 
tfbk_history_admin ORDER BY id DESC 
LIMIT 1");

$sql->execute();


while($data = $sql->fetch()){
    $marketcap = $data['marketcap'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock - Catégorie d'articles</title>
</head>
<body>
    <?php include 'header.php'; ?>
        <div class="annonces">
            <div class="annonces__top short">
                <h1 class="annonces__top__title" >
                    Catégorie <?= $category_name ?>
                </h1>  <br>

                <button>
                    <a href="espace-personnel.php">
                        Accéder à mon espace personnel
                    </a>
                </button>
            </div>


            <div class="annonces__recommanded">
               

                <p class="annonces__recommanded__link">
                    <a href="toutes-les-categories.php">
                    Toutes les categories <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </p> <br>

                <div class="annonces__recommanded__products">
                    <?php 


                        //recuperation des articles de la catégorie
                       

                    if($count == 0 ){
                        echo "Aucun article à afficher";
                            }
                    
                        if ($count > 0){
                            foreach($articles as $product){ ?>

                                <div class="product">
                                    <div class="product__image">
                                        <img src="public/images/articles/<?= $product['image_1']; ?>" alt="">
                                    </div>

                                            <p class="product__name">
                                                <?= $product['article_name'] ?> <br>

                                            </p>

                                            <p class="product__price">
                                            <?php echo number_format($product['euro_price'],2)." €" ?> 
                                            </p>
                                            <br>
                                            <?= $product['category_name'] ?>

                                            <p class="product__location">
                                            <i class="fas fa-map-marker-alt"></i> <?= $product['location'] ?>
                                            </p>

                                            <p class="product__description"> <p><?= substr($product["description"], 0, 20); echo ' ...'  ?></p>
                                            </p>

                                    <button>
                                        <a href="article.php?id=<?=$product['id']?>">
                                            Voir article
                                        </a>
                                    </button>
                                </div>
                            <?php } ?>
                            
                            <ul class="pagination">
                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?> ">
                            <a href="categorie.php?id=<?=$_GET['id']?>&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                            </li>
                            
                            <?php   for ($page = 1; $page <= $pages; $page++): ?>
    
                                <li class="page-item <?= ($currentPage == $page) ? "active": "" ?> ">
                                <a href="categorie.php?id=<?=$_GET['id']?>&page=<?= $page ?>" class="page-link"> <?= $page ?></a>
                                </li>
                           
                            <?php endfor ?>
                            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?> ">
                                <a href="categorie.php?id=<?=$_GET['id']?>&page=<?= $currentPage + 1 ?>"  class="page-link">Suivante</a>
                            </li>
                        </ul>
                         <?php } ?>
                </div>

                   
            </div>
    <?php include 'footer.php'; ?>
</body>
</html>