<?php session_start();

if(!isset($_SESSION['user'])){
    header("Location: connexion.php");
    exit;
}

include 'traitements/db.php';
include 'traitements/traitement-creer-wallet.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?> 
    
    <title>Fineblock - Creer wallet</title>
</head>

<body>
    <div class="register" id="register">
        <form action="" method="POST" class="form">
            

        <?php 

            if (!empty($errors)):?>
                <div class="alert" width=400>
                    <p>
                        Vous n'avez pas rempli le formulaire correctement
                    </p>
                    <ul>
                        <?php foreach ($errors as $error): ?>   
                            <li><?= $error; ?></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            <?php endif; ?>

   
            <a href="index.php"class="form__close" >
                <i class="fas fa-times"></i>
            </a> <br>

            <a href="tableau-de-bord.php">
            <img src="public/images/logo-fineblock.png"
                alt="" class="form__logo">
            </a> <br>
                            
            <label for="zip-adress" class="form__label"> 
                    Nom et prénoms: <br>
                    <input type="text" name="adress_solana" required value="<?=$fullName?>"
                        id="zip_adress">
                </label> <br>

                <label for="zip-adress" class="form__label"> 
                    Email: <br>
                    <input type="text" name="adress_solana" required value="<?=$email?>"
                        id="zip_adress">
                </label> <br>

                <label for="zip-adress" class="form__label"> 
                    Volume de TFBK à envoyer: <br>
                     (Stock actuel: <span><?= $rounded_markecap = number_format($total, 
                        2, ',', ' '); ?></span> ) <br>
                   <select name="quantity" id="" required class="quantity" step="any">
                       <option value="">Veuillez sélectionner</option>
                       <option value="4.16">4.16</option>
                       <option value="43.75">43.75</option>
                       <option value="83.33">83.33</option>
                       <option value="100">100</option>
                   </select>
                </label> <br> <br>

            
              <button class="form__button" type="submit"
               id="formbtoc2_submit" name="valider">valider
              </button>

              <p class="form__text">
              La libération de votre stock complet se fera après le référencement
               du TFBK sur les plateformes DEX (décentralisées).
              </p> <br>

             
        </form>  
    </div>
    
    <script src="public/js/script.js" ></script>
</body>
</html>