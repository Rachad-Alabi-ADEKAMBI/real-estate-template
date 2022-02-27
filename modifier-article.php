<?php session_start(); 

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

include 'traitements/traitement-modifier-article.php';

$article_id = verifyInput($_GET['id']);


if ($article_id <= 0){
    header("Location: index.php");
}

     //On vérifie que c'est bien le compte de l'auteur de l'annonce
     if($_SESSION['user']['id'] != $datas['seller_id']){
        ?>
            <script>
                alert("Vous n'avez pas le droit de consulter cette page");
                window.location.replace("index.php");
                exit();
            </script>

        <?php
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?>

    <title>Fineblock - Modifier Article</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="new-ad">
        <div class="new-ad__top">
            <h1 class="new-ad__top__title">
                Modifier l'article <?= $datas['article_name']  ?> 
            </h1>

                <button>
                    <a href="mes-annonces.php">
                        Mes annonces
                    </a>
                </button>
        </div>

        <div class="new-ad__bottom">
        <a href="espace-personnel.php">
                <i class="fas fa-long-arrow-alt-left"></i> Espace personnel
            </a>

            <form action="" method="POST"  enctype="multipart/form-data"  class="form">
        
        
        <?php  include 'errors.php'; ?>

        <div class="form__top">
            <div class="left">
                <label for="title">
                    Titre:  <br>
                    <input type="text" name="article_name"
                    placeholder="<?= $datas['article_name']  ?>" >
                </label> <br>
                <div class="form_group">
                    <label for="price">
                        Prix en euros: <br>
                        <input type="number" name="euro_price" 
                        onkeyup="if(this.value<0){this.value= this.value * -1}"
                        placeholder="<?= $datas['euro_price']  ?>" >
                    </label>
                </div>
            </div>

            <div class="right">
                <label for="category_name">
                    Catégorie du produit:  <br>
                    <select name="category_name" id="" >
                        <option value=""><?= $datas['category_name']  ?></option>
                        <option value="Auto">Auto</option>
                       <option value="Bateau">Bateau</option>
                     <!--    <option>Meubles de jardin</option> -->
             <!--  <option value="Meubles de maison">Meubles de maison</option> -->
                     <!--   <option value="Mobilier de bureau">Mobilier de bureau</option> -->
                        <option value="Moto">Moto</option>
                        <option value="Téléphone">Téléphone</option>
                        <option value="Autres">Autres</option>
                    </select>
                </label> <br>

                <label for="location">
                    Localisation:   <br>
                    <input type="text" name="location"
                     placeholder="<?= $datas['location']  ?>">
                </label>
            </div>
        </div>

        <div class="form__main">
            <label for="description"  >
                Description:  <br>
                <textarea name="description" id="" 
                cols="30" rows="10" 
                placeholder="<?= $datas['description']  ?>" ></textarea>
            </label>
        </div>

        <div class="form__bottom">
            <div class="left">
                <div class="form_group">
                <label for="" class="label-price" >Marque: <br>
                        <input type="text" placeholder="<?= $datas['brand']  ?>"
                         name="brand" >
                    </label>

                    <label for="" class="label-price" >
                            Modèle: <br>
                        <input type="text" name="model" 
                        placeholder="<?= $datas['model']  ?>">
                    </label>
                </div>

                <div class="form_group">
                <label for="" class="label-price" >Année d'achat:<br>
                        <input type="number" placeholder="" name="year" 
                        placecholder="<?= $datas['year']  ?>"
                        onkeyup="if(this.value<0){this.value= this.value * -1}">
                    </label>

                    <label for="" class="label-price" >Etat:<br>
                        <select name="state" id="" > 
                            <option value=""><?= $datas['state']  ?></option>
                            <option value="Neuf">Neuf</option>
                            <option value="Usé">Usé</option>
                        </select>
                    </label>
                </div>

            </div>

            <div class="right">
                <label for="new-ad-picture">
                    Image: <br>
                    <input type="file" name="profileImage" >
                </label>
            </div>
        </div> <br>

      
        <button type="submit">
            Modifier
        </button>
        
    </form>
        </div>

    </div>
    <?php 
    include 'footer.php'; ?>
</body>
</html>