<?php session_start();

include 'traitements/db.php';

include 'traitements/traitement-inscription-livre-blanc.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?> 
    
    <title>Fineblock - Inscription pour achat du livre blanc</title>
</head>

<body>
    <div class="register" id="register">
        <form action="" method="POST"  class="form">

        <?php include 'errors.php'; ?>
        
            <a href="index.php" class="form__close" >
                <i class="fas fa-times"></i>
            </a> <br>

            <a href="index.php">
            <img src="public/images/logo-fineblock.png"
                alt="" class="form__logo">
            </a> <br>

                <label for="zip-adress" class="form__label"> 
                   Email: <br>
                    <input type="text" name="email" 
                        id="zip_adress" required >
                </label>  <br>
              <button class="form__button" type="submit"
               id="formbtoc2_submit" name="valider"> Commander
              </button>
        </form>  
    </div>
    
    <script src="public/js/script.js" ></script>
</body>
</html>