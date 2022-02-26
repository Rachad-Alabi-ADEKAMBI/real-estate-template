<?php session_start();

include 'traitements/db.php';

include 'traitements/traitement-inscription-particuliers.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'meta.php'; ?> 
    
    <title>Fineblock - Inscription Particuliers</title>
</head>

<body>
    <div class="register" id="register">
        <form action="" method="POST"  enctype="multipart/form-data"  class="form">

        <?php include 'errors.php'; ?>
        
            <a href="index.php"class="form__close" >
                <i class="fas fa-times"></i>
            </a> <br>

            <a href="index.php">
            <img src="public/images/logo-fineblock.png"
                alt="" class="form__logo">
            </a> <br>

                <label for="zip-adress" class="form__label"> 
                    Adresse postale: <br>
                    <input type="text" name="zip_adress" 
                        id="zip_adress" required >
                </label> 

                <div class="form__details">
                    <label  class=""> Ville: <br>
                        <input type="text" name="city" required >
                    </label>

                    <label  class=""> Code postal: <br>
                        <input type="number" name="zip_code"  onkeyup="if(this.value<0){this.value= this.value * -1}" required >
                    </label> 
                </div>

                <label for="zip-adress" class="form__label"> 
                    Pays: <br>
                    <input type="text" name="country" 
                        id="zip_adress" required >
                </label> 

                <div class="form__details">
                  <label class="form__label"> Justificatif utilisé:
                    <select name="card" required >
                      <option value="">selectionner</option>
                      <option value="P">Passeport</option>
                      <option value="CI">Carte d'identité</option>
                    </select> 
                  </label>
                  
                  <label class="form__label"> Images du justificatif:<br>
                              <input type="file" name="card_picture" id="" required >
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