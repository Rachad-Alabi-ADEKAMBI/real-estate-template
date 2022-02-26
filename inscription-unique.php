<?php session_start();

if(isset($_SESSION['user'])){
    header("Location: tableau-de-bord.php");
    exit;
}

include 'traitements/db.php';

include 'traitements/traitement-inscription-unique.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?> 
    
    <title>Fineblock - Inscription unique</title>
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

            <a href="index.php">
            <img src="public/images/logo-fineblock.png"
                alt="" class="form__logo">
            </a> <br>
                            
            <label for="zip-adress" class="form__label"> 
                    Définir un email: <br>
                    <input type="email" name="email" required
                        id="zip_adress">
                </label> <br>

                <label for="zip-adress" class="form__label"> 
                    Définir un pseudo: <br>
                    <input type="text" name="username" required
                        id="zip_adress">
                </label> 

             <div class="form__details">
                <label for="mdp" class="form__label">Définir un mot de passe:
                    <input type="password" name="password1" id="password1" required >
                  </label> <br>

                  <label class="form__label" for="mdp2"> Confirmer le mot de passe:
                    <input type="password" name="password2" id="password2" required >
                  </label>
             </div>

              <button class="form__button" type="submit"
               id="formbtoc2_submit" name="valider">valider
              </button>
        </form>  
    </div>
    
    <script src="public/js/script.js" ></script>
</body>
</html>